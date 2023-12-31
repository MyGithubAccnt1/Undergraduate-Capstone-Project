const crypto = require('crypto');
const nodemailer = require('nodemailer');
const express = require('express');
const cors = require('cors');
const app = express();
const port = 3000;

const corsOptions = {
  origin: ['http://localhost', 'http://20.205.112.210'],
  optionsSuccessStatus: 200,
};

app.use(cors(corsOptions));

app.use(express.json());

function generateOTP() {
  return crypto.randomBytes(4).toString('hex').toUpperCase();
}

app.post('/send-otp', async (req, res) => {
  const email = req.body.email;
  const otp = generateOTP();

  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'mhelvoi.bernabe@cvsu.edu.ph',
      pass: 'wxzh uqod vtuv qfwv',
    },
  });

  const mailOptions = {
    from: 'mhelvoi.bernabe@cvsu.edu.ph',
    to: email,
    subject: 'SBM Account Verification',
    text: `Your Verification code is: ${otp}`,
  };

  try {
    const info = await transporter.sendMail(mailOptions);
    console.log('Email sent: ', info.response);

    res.status(200).json({ success: true, otp });
  } catch (error) {
    console.error('Error sending email:', error);
    res.status(500).json({ success: false, error: 'Failed to send email', details: error.message });
  }
});

app.get('/get-nominatim-data', (req, res) => {
  const nominatimApiUrl = 'https://nominatim.openstreetmap.org/reverse' + req.url;
  
  request(nominatimApiUrl, (error, response, body) => {
    if (!error && response.statusCode === 200) {
      res.send(body);
    } else {
      res.status(response ? response.statusCode : 500).send(error || 'Internal Server Error');
    }
  });
});

app.listen(port, () => {
  console.log(`Server running at ${corsOptions.origin.join(', ')}:${port}`);
});



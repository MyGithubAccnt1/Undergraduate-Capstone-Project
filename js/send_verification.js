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
      user: 'saintbenedictmedallioncavite@gmail.com',
      pass: 'pabo npjd xgtf xcww',
    },
  });

  const mailOptions = {
    from: 'saintbenedictmedallioncavite@gmail.com',
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

app.listen(port, () => {
  console.log(`Server running at ${corsOptions.origin.join(', ')}:${port}`);
});



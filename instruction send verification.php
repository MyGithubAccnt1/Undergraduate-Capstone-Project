// download latest node js

// open cmd

// cd C:\xampp\htdocs\your-capstone-folder

// npm install nodemailer - wait for cmd to finish

// npm install express - wait for cmd to finish

// npm install cors - wait for cmd to finish

// follow instruction in the cmd after the command

// https://myaccount.google.com/security-checkup
// make your account 2-Step Verification (2SV)

// https://myaccount.google.com/apppasswords
// Sample app name: Verification Sender
// create
// copy password

// if you have js folder (all javascript file is inside that folder) in your capstone folder, create a file there. if not, create a file anywhere inside your capstone folder.

// anyfilename.js - put node js code for sending verification thru email.

// node js code starts here --------------------------------------------------------

const crypto = require('crypto');
const nodemailer = require('nodemailer');
const express = require('express');
const cors = require('cors');
const app = express();
const port = 3000;

change this ------------------------------------------------------- only the origin

const corsOptions = {
  origin: ['http://localhost/capstone/', 'http://20.205.112.210/'],
  optionsSuccessStatus: 200,
};

change this ------------------------------------------------------- only the origin

app.use(cors(corsOptions));

app.use(express.json());

function generateOTP() {
  return crypto.randomBytes(4).toString('hex').toUpperCase();
}

app.post('/send-otp', async (req, res) => {
  const email = req.body.email;
  const otp = generateOTP();

  change this ------------------------------------------------------- only the user & pass

  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'mhelvoi.bernabe@cvsu.edu.ph',
      pass: 'paste the copied password',
    },
  });

  change this ------------------------------------------------------- only the user & pass

  change this ------------------------------------------------------- only the from, subject & text
  				(${otp} is the random generated code - dont remove)

  const mailOptions = {
    from: 'mhelvoi.bernabe@cvsu.edu.ph',
    to: email,
    subject: 'SBM Account Verification',
    text: `Your Verification code is: ${otp}`,
  };

  change this ------------------------------------------------------- only the from, subject & text

  try {
    const info = await transporter.sendMail(mailOptions);
    console.log('Email sent: ', info.response);

    res.status(200).json({ success: true, otp });
  } catch (error) {
    console.error('Error sending email:', error);
    res.status(500).json({ success: false, error: 'Failed to send email', details: error.message });
  }});

app.listen(port, () => {
  console.log(`Server running at ${corsOptions.origin.join(', ')}:${port}`);
});

// node js code ends here --------------------------------------------------------

// in your register/sign-up page, edit the file.

<!doctype html>
<html lang="en">
	<head>

	</head>
	<body>
		-------------- at the very bottom of body -----------------
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="js/verify.js"></script>
		------------ before any <scrit></script> tag --------------

		------------ add this to your current code --------------
		(when user register/sign-up - you have code to test if user input is valid)
		(after that code insert this code)

		var currentOrigin = window.location.origin;
		var apiUrl = currentOrigin + ':3000/send-otp';

		$.ajax({
		    type: 'POST',
		    url: apiUrl,
		    contentType: 'application/json',
		    data: JSON.stringify({ email }),
		    success: function (response) {
		        otp = response.otp;

		        console.log('This is the verification code:' + otp);

		        (show the user a window where to type the verification code sent in email)

		        (sample code to redirect the user to other page)
		        	window.location.href = 'otherpage.php';
		        	------------------ or ------------------
		        	window.location.href = 'otherpage.html';

	        	(sample code to pass the otp to other page using javascript)
	        		window.localstorage.setItem('otp', otp);

	        	(sample code to get the otp using javascript)
	        		var verify = window.localstorage.getItem('otp');
	        		--- otp is inside a variable called verify ---

		    },
		    error: function (error) {
		        console.error(error);
		    }
		});
		------------ add this to your current code --------------
	</body>
</html>
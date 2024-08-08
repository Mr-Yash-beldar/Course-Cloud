<?php
require_once("../../../include/initialize.php");
require 'vendor/autoload.php'; // Path to autoload.php of PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if 'aid' is set in the URL
if(isset($_GET['aid'])) {
    $studentid = $_GET['aid'];

    // Query to fetch student details including email and status
    $sql = "SELECT Fname, Lname, email, status FROM tblstudent WHERE StudentID='{$studentid}'";
    $mydb->setQuery($sql);
    $student = $mydb->loadSingleResult();

    // Check if student exists
    if($student) {
        $status = $student->status;
        
        // Check if status is 'Not Given'
        if($status == 'Not Given') {
            // Compose email message
            $subject = "Reminder: Test Not Attempted";
            $message = '<img src="https://i.ibb.co/Y2JD690/login1.png" alt="Course Cloud Logo" style="width: 150px;"><br><br>'; // Embedded image
            $message .= "Dear {$student->Fname} {$student->Lname},<br><br>";
            $message .= "This is a reminder that you have not attempted the test yet. Please attempt the test as soon as possible.<br><br>";
            $message .= "Regards,<br>Course Cloud Admin<br>";
            $message .= "For queries, contact <a href='https://github.com/Mr-Yash-beldar'>Yashodip Beldar</a>";

            // Send email using PHPMailer
            $mail = new PHPMailer(true); // Passing `true` enables exceptions

            try {
                // Server settings
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'youremail'; // SMTP username
                $mail->Password = 'youremailpassword'; // SMTP password
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587; // TCP port to connect to

                // Recipients
                $mail->setFrom('youremail', 'Course Cloud');
                $mail->addAddress($student->email); // Add a recipient

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();
                // JavaScript alert for success
                echo '<script>alert("Email sent successfully to ' . $student->Fname . ' ' . $student->Lname . '");</script>';
            } catch (Exception $e) {
                // JavaScript alert for error
                echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");</script>';
            }
        } else {
            // JavaScript alert if status is not 'Not Given'
            echo '<script>alert("' . $student->Fname . ' ' . $student->Lname . ' has already attempted the test.");</script>';
        }
    } else {
        // JavaScript alert if student does not exist
        echo '<script>alert("Student not found.");</script>';
    }
} else {
    // JavaScript alert if 'aid' is not set in the URL
    echo '<script>alert("Student ID not provided.");</script>';
}

// Perform redirection using header() function
echo '<script>
setTimeout(function() {
    window.location.href = "index.php";
}, 500); // 500 milliseconds delay
</script>';
?>

                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
               
                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587; // TCP port to connect to

                // Recipients
                $mail->setFrom('youremail', 'Course Cloud');
                $mail->addAddress($student->email); // Add a recipient
                echo $student->email;

                // Content
                $mail->isHTML(false); // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();
                // Set the redirection URL
                $redirect_url = 'index.php';
                // JavaScript alert
                echo '<script>alert("Email sent successfully to ' . $student->Fname . ' ' . $student->Lname . '");</script>';
            } catch (Exception $e) {
                // JavaScript alert for error
                echo '<script>alert("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");</script>';
            }
        } else {
            // JavaScript alert if status is not 'Not Given'
            echo '<script>alert("' . $student->Fname . ' ' . $student->Lname . ' has already attempted the test.");</script>';
        }
    } else {
        // JavaScript alert if student does not exist
        echo '<script>alert("Student not found.");</script>';
    }
} else {
    // JavaScript alert if 'aid' is not set in the URL
    echo '<script>alert("Student ID not provided.");</script>';
}

// Perform redirection using header() function
echo '<script>
setTimeout(function() {
    window.location.href = "index.php";
}, 500); // 500 milliseconds delay (2 seconds)
</script>';


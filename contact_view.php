<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Contact Form</h1>
        <form action="includes/contact_contr.inc.php" method="post">
            <div class="alignment">
                <label for="fname" class="required">Name</label>
                <input type="text" name="fname" placeholder="Firstname" required />
                <input type="text" name="lname" placeholder="Lastname" required />
            </div>
            <div class="alignment">
                <label for="email" class="required">Email</label>
                <input type="email" name="email" placeholder="Email" required />
            </div>
            <div class="alignment">
                <label for="phone" class="required">Phone</label>
                <input type="tel" name="phone" placeholder="Phone" required/>
            </div>
            <div class="alignment">
                <label for="message" class="required">Message</label>
                <textarea name="messages" placeholder="Write your message here..." cols="50" rows="10" required></textarea> 
            </div>
            <button type="submit">Submit</button>
        </form>
    </main> 
</body>
</html>
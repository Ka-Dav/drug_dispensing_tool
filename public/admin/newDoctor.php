<!DOCTYPE html>
<html>
  <head>
    <title>Doctors</title>
  </head>
  <body>
    <h1>Doctors Registration Form</h1>
    <form action="../../src/doctors.php" method="POST">
      <label for="ssn">SSN:</label>
      <input type="text" id="ssn" name="ssn" required><br><br>
      
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="fName" required><br><br>
      
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lName" required><br><br>
      
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required><br><br>
      
      <label for="yoe">Age:</label>
      <input type="number" id="yoe" name="experience" required><br><br>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
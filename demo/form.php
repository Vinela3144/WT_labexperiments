 <!DOCTYPE html>
<html>
    <body>
        <head>
            <link rel="stylesheet" href="style.css" />
        </head>
         
        <div class="container">
            <h1>Enter the details to create account</h1>
            <form name="registration" class="registartion-form"  method="post" action="connect.php">
              <table>
                <tr>
                  <td><label for="name">Name:</label></td>
                  <td><input type="text" name="name" id="name" placeholder="your name"></td>
                </tr>
                <tr>
                  <td><label for="email">Email:</label></td>
                  <td><input type="text" name="email" id="email" placeholder="your email"></td>
                </tr>
            
                <tr>
                  <td><label for="phoneNumber">Phone Number:</label></td>
                  <td><input type="number" name="phoneNumber" id="phoneNumber"></td>
                </tr>
                <tr>
                  <td><label for="gender">Gender:</label></td>
                  <td>Male: <input type="radio" name="gender" value="male">
                    Female: <input type="radio" name="gender" value="female">
                    Other: <input type="radio" name="gender" value="other"></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" class="submit" value="create" /></td>
                </tr>
              </table>
            </form>
          </div>
        
    </body>
</html>
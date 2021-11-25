
<?php include ("header.php"); ?>

<center>
    <form method="post" action="Resources\config\resetpasword.php">
    <table>
    <tr><td colspan="2" style="text-align: center;background-color:#00435f;color:white; padding-bottom:10px; padding-top:10px;">
    <label>Forgot Password</label></td>
    </tr>
    <tr>
    <td><label>Usuario</label></td>
    </tr>
    <tr><td><input type="text" name="txtusuario"/></td></tr>
    <tr><td><label>Password</label></td></tr>
    <tr><td><input type="password" name="txtpassword1" /> </td></tr>
    <tr><td><label>Confirm Password</label></td></tr>
    <tr><td><input type="password" name="txtpassword2" /> </td></tr>
    <tr><td><input type="submit" value="Ingresar" /> </td></tr>
    </table>
    </form>
</center>
<style>

    table 
    {
    border: 2px solid #353A46;
    background-color: #3ABAF1;
    }
    
    input[type=text], input[type=password]
    {
    width: 100%;
    padding: 8px 20px;
    border: 2px solid #ccc;
    box-sizing: border-box;
    }
    
    
    
    label
    {
    font-size: 14px;
    font-weight: bold;
    font-family: arial;
    }
    
    input[type=submit]
    {
    background-color: #1C94C8;
    color:white;
    padding: 8px 10px;
    margin: 8px 0px;
    border: solid;
    cursor: pointer;
    width: 40%;
    }
</style>




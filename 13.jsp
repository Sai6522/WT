<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login</h2>
    <form action="authenticate.jsp" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>


<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
    <title>Authentication Result</title>
</head>
<body>
    <h2>Authentication Result</h2>
    <%
        // Get the submitted username and password from the request
        String username = request.getParameter("username");
        String password = request.getParameter("password");

        // Define the valid username and password (you should replace these with your actual values)
        String validUsername = "your_username";
        String validPassword = "your_password";

        if (username.equals(validUsername) && password.equals(validPassword)) {
    %>
        <p>Welcome, <%= username %>! Authentication successful.</p>
    <%
        } else {
    %>
        <p>Authentication failed. Please check your username and password.</p>
    <%
        }
    %>
</body>
</html>



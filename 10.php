<!DOCTYPE html> 
<html> 
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title> Login Page </title> 
<style> 
Body { 
 font-family: Calibri, Helvetica, sans-serif; 
 background-color: pink; 
} 
button { 
 background-color: #4CAF50; 
 width: 100%; 
 color: orange; 
 padding: 15px; 
 margin: 10px 0px; 
 border: none; 
 cursor: pointer; 
 } 
form { 
width: 25%;
 border: 3px solid #f1f1f1; 
 } 
input[type=text], input[type=password] { 
 width: 100%; 
 margin: 8px 0; 
 padding: 12px 20px; 
 display: inline-block; 
 border: 2px solid green; 
 box-sizing: border-box; 
 } 
button:hover { 
 opacity: 0.7; 
 } 
 .cancelbtn { 
 width: auto; 
 padding: 10px 18px; 
 margin: 10px 5px; 
 } 
.container { 
 padding: 25px; 
 background-color: lightblue; 
 } 
</style> 
</head> 
<body> 
 <center> <h1> Login Form </h1> 
 <form action="cookies" method="post"> 
 <div class="container"> 
 <input type="text" placeholder="Enter Username" name="uname" required> 
 <input type="password" placeholder="Enter Password" name="pass" 
required> 
 <button type="submit">Login</button> 
 </div> 
 </form> </center> 
</body> 
</html>
login.java:
import java.io.*;
import jakarta.servlet.*;
import jakarta.servlet.http.*;
public class login extends HttpServlet
{
 public void doPost(HttpServletRequest request, HttpServletResponse response)
 throws ServletException, IOException
 {
 response.setContentType("text/html");
 String n=request.getParameter("uname");
 String p=request.getParameter("pass");
 PrintWriter out = response.getWriter();
 Cookie nam1=new Cookie("user1","user1");
 Cookie nam2=new Cookie("user2","user2");
 Cookie nam3=new Cookie("user3","user3");
 Cookie nam4=new Cookie("user4","user4");
 Cookie pas1=new Cookie("pwd1","pwd1");
 Cookie pas2=new Cookie("pwd2","pwd2");
 Cookie pas3=new Cookie("pwd3","pwd3");
 Cookie pas4=new Cookie("pwd4","pwd4");
 int flag=0;
 String nam[]={nam1.getValue(),nam2.getValue(),nam3.getValue(),nam4.getValue()};
 String pas[]={pas1.getValue(),pas2.getValue(),pas3.getValue(),pas4.getValue()};
 for(int i=0;i<4;i++)
 {
 if(nam[i].equals(n)&&pas[i].equals(p))
 {
 flag=1;
 }
 }
 if(flag==1)
 {
 out.println("Wecome you "+n.toUpperCase());
 }
 else
 {
 out.println("You are not an authenticated user");
 }
}
}
Web.xml:
<web-app>
 <servlet>
 <servlet-name>login</servlet-name>
 <servlet-class>login</servlet-class>
 </servlet>
 <servlet-mapping>
 <servlet-name>login</servlet-name>
 <url-pattern>/cookies</url-pattern>
 </servlet-mapping> 
</web-app> 
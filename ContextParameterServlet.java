import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.ServletContext;
import java.io.IOException;
import java.io.PrintWriter;

@WebServlet("/ContextParameterServlet")
public class ContextParameterServlet extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // Get access to the ServletContext to retrieve context parameters
        ServletContext context = getServletContext();

        // Retrieve the context parameters defined in web.xml
        String databaseUrl = context.getInitParameter("database_url");
        String apiKey = context.getInitParameter("api_key");

        out.println("<html>");
        out.println("<head><title>Context Parameter Example</title></head>");
        out.println("<body>");
        out.println("<h1>Context Parameter Example</h1>");
        out.println("<p>Database URL: " + databaseUrl + "</p>");
        out.println("<p>API Key: " + apiKey + "</p>");
        out.println("</body>");
        out.println("</html>");
    }
}

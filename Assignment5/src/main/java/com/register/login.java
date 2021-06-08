package com.register;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class login extends HttpServlet {
	String email,password;
	public void service(HttpServletRequest req,HttpServletResponse res) throws IOException
	{
		 email = req.getParameter("email");
		 password = req.getParameter("password");
		 PrintWriter out = res.getWriter();
			
			try {
				out.println(check());
			} catch (ClassNotFoundException e) {
				// TODO Auto-generated catch block
				out.println(e.toString());
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				out.println(e.toString());
			}
	}
	String check() throws ClassNotFoundException, SQLException
	{
		Statement statement;
		Connection connection = null;
		Class.forName("com.mysql.jdbc.Driver");
		try {
			connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/students?autoReconnect=true&useSSL=false","root","Atharva");
			statement =connection.createStatement();
		}
		catch(Exception e){
			return e.getMessage();
		}
		String  sql = "select * from users where email = \"" + email + "\" and password = \"" + password +  "\"";
		
		try {
			ResultSet result = statement.executeQuery(sql);
			if (result.next())
			{
				
			}
			else
			{
				return "Email ID or password is incorrect or student not registered";
			}
		}
		catch (SQLException S){
			int errorCode = S.getErrorCode();
			if(errorCode == 1062)
				return "Student already Registered!!!";
			if (errorCode == 1406)
				return "Character limit exceeded";
			return S.getErrorCode()+S.getLocalizedMessage();
		}
		return "Successfully logged in";
	}
}

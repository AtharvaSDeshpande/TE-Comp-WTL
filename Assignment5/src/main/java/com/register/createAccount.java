package com.register;
import java.io.IOException;
import java.io.PrintWriter;

import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.sql.*;
public class createAccount extends HttpServlet
{
	String firstName,lastName,email,password;
	long mobile;
	Date dob;
	public void service(HttpServletRequest req,HttpServletResponse res) throws IOException
	{
		 firstName = req.getParameter("firstName");
		 lastName = req.getParameter("lastName");
		 String date =req.getParameter("dob").toString(); 
		
		dob = Date.valueOf(req.getParameter("dob"));
		 email = req.getParameter("email");
		 password = req.getParameter("password");
		 String confirmPassword = req.getParameter("confirmPassword");
		 mobile = Long.parseLong(req.getParameter("mobile"));
		
		PrintWriter out = res.getWriter();
//		out.println("The Result is " + firstName + " " + lastName + " " + dob.toString() + " " + email + " " + mobile + " " + password + " " + confirmPassword);
		try {
			out.println(insert());
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			out.println(e.toString());
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			out.println(e.toString());
		}
		
	
	}
	String insert() throws ClassNotFoundException, SQLException
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
		String  sql = "insert into users(firstName, lastName, dob, email, mobile, password) values(?,?,?,?,?,?)";
		PreparedStatement preparedStatement  = insertToDatabasePreparedStatement(((connection.prepareStatement(sql))));
		try {
			preparedStatement.executeUpdate();
		}
		catch (SQLException S){
			int errorCode = S.getErrorCode();
			if(errorCode == 1062)
				return "Student already Registered!!!";
			if (errorCode == 1406)
				return "Character limit exceeded";
			return S.getErrorCode()+S.getLocalizedMessage();
		}
		return "Successfully added student to database";
	}
	PreparedStatement insertToDatabasePreparedStatement(PreparedStatement preparedStatement) throws SQLException {
		preparedStatement.setString(1,firstName);
		preparedStatement.setString(2,lastName);
		preparedStatement.setDate(3, dob);
		preparedStatement.setString(4,email);
		preparedStatement.setString(5,mobile + "");
		preparedStatement.setString(6,password);
		
		
		return preparedStatement;
		
	}
}
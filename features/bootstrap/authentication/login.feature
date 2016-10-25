Feature: Login
	In order to login to the site
	As a user
	I want to be able to login and navigate

	@auth @login
	Scenario: View Login Page
		Given I am on the homepage
		When I follow "Login"
		Then the url should match "/login"

	@auth @login
	Scenario: No Email
		Given I am on "login"
		When I fill in the following:
			| password | password |
		And I press "Sign in"
		Then I should see "email field is required"

	@auth @login
	Scenario: No Password
		Given I am on "login"
		When I fill in the following:
			| email | user@example.com |
		And I press "Sign in"
		Then I should see "password field is required"

	@auth @login
	Scenario: Invalid login
		Given I am on "login"
		When I fill in the following:
			| email | user@example.com |
			| password | password |
		And I press "Sign in"
		Then I should see "credentials do not match"

	@auth @login
	Scenario: Incorrect Password
		Given I have an account "user@example.com" "password"
		Given I am on "login"
		When I fill in the following:
			| email | user@example.com |
			| password | password1 |
		And I press "Sign in"
		Then I should see "credentials do not match"

	@auth @login
	Scenario: Valid login
		Given I have an account "user@example.com" "password"
		Given I am on "login"
		When I fill in the following:
			| email | user@example.com |
			| password | password |
		And I press "Sign in"
		Then the url should match "home"

Feature: Registration
	In order to use the site
	As a user
	I want to be able to register

	@auth @register
	Scenario: View Register Page
		Given I am on the homepage
		When I follow "Register"
		Then the url should match "/register"

	@auth @register
	Scenario: View Register Page from Login Page
		Given I am on "login"
		When I follow "Not Registered?"
		Then the url should match "/register"
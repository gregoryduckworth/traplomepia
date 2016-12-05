Feature: Registration
	In order to use the site
	As a user
	I want to be able to register

	Background:
		Given site setting "registration" is "open"
		And I am on the homepage

	@auth @register
	Scenario: View Register Page
		When I follow "Register"
		Then the url should match "/register"

	@auth @register
	Scenario: View Register Page from Login Page
		When I follow "Login"
		When I follow "Not Registered?"
		Then the url should match "/register"

	@auth @register
	Scenario: No First Name
		Given I am on "register"
		When I fill in the following:
			| last_name | Doe |
			| email | john.doe@example.com |
			| password | password |
			| password_confirmation | password |
		And check "Agree to Terms"
		And I press "Register"
		Then I should see "The first name field is required"
		Then the url should match "register"

	@auth @register
	Scenario: No Last Name
		Given I am on "register"
		When I fill in the following:
			| first_name | John |
			| email | john.doe@example.com |
			| password | password |
			| password_confirmation | password |
		And check "Agree to Terms"
		And I press "Register"
		Then I should see "The last name field is required"
		Then the url should match "register"

	@auth @register
	Scenario: No Email
		Given I am on "register"
		When I fill in the following:
			| first_name | John |
			| last_name | Doe |
			| password | password |
			| password_confirmation | password |
		And check "Agree to Terms"
		And I press "Register"
		Then I should see "The email field is required"
		Then the url should match "register"

	@auth @register
	Scenario: No Password
		Given I am on "register"
		When I fill in the following:
			| first_name | John |
			| last_name | Doe |
			| email | john.doe@example.com |
			| password_confirmation | password |
		And check "Agree to Terms"
		And I press "Register"
		Then I should see "The password field is required"
		Then the url should match "register"

	@auth @register
	Scenario: No Confirmation Password
		Given I am on "register"
		When I fill in the following:
			| first_name | John |
			| last_name | Doe |
			| email | john.doe@example.com |
			| password | password |
		And check "Agree to Terms"
		And I press "Register"
		Then I should see "The password confirmation does not match"
		Then the url should match "register"

	@auth @register
	Scenario: Not Agreed to Terms
		Given I am on "register"
		When I fill in the following:
			| first_name | John |
			| last_name | Doe |
			| email | john.doe@example.com |
			| password | password |
			| password_confirmation | password |
		And I press "Register"
		Then I should see "The terms field is required"
		Then the url should match "register"

	@auth @register
	Scenario: Register for site
		Given I am on "register"
		When I fill in the following:
			| first_name | John |
			| last_name | Doe |
			| email | john.doe@example.com |
			| password | password |
			| password_confirmation | password |	
		And I check "terms"
		And I press "Register"
		Then the url should match "home"
Feature: Password Reset
	In order to reset a password
	As a user
	I want to be able to request a reset

	@auth @password-reset
	Scenario: View Forgot Password page
		Given I am on "login"
		When I follow "Forgot Password"
		Then the url should match "/password/reset"

	@auth @password-reset
	Scenario: Send Password to invalid email
		Given I am on "password/reset"
		When I fill in "email" with "foo@bar.com"
		And I press "Send Password Reset Link"
		Then I should see "can't find a user"

	@auth @password-reset
	Scenario: Send Password to blank email
		Given I am on "password/reset"
		When I press "Send Password Reset Link"
		Then I should see "email field is required"
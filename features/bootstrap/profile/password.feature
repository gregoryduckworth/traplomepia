Feature: Change Password
	In order to change my password
	As a user
	I want to be able to visit the profile page

	Background:
		Given I am logged in as "user@example.com"
		And I am on "/home"
		When I follow "user-menu"
		And I follow "Profile"
		Then the url should match "/profile"


	@profile @change-password @javascript
	Scenario: Incorrect Password
		Given I am on "profile"
		When I fill in the following:
			| old_password | something_wrong |
			| password | password |
			| password_confirmation | password |
		And I press "Submit"
		Then I should see "Sorry, your old password did not match"

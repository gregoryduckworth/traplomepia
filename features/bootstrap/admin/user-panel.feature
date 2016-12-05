Feature: User Panel
	An administrator has the ability to add/edit/delete/restore
	a user within the system

	Background: 
		Given site setting "full_name" is "AdminSite"
		And I am logged in as an "administrator"

	@admin @user-panel @javascript
	Scenario: Create a new user
		Given I am on "/admin/users/create"
		Then print last response
		Then the url should match "/admin/users/create"
		When I fill in the following:
			| first_name | John |
			| last_name | Doe |
			| email | john.doe@example.com |
			| dob | 01/01/1980 |
		And I select "Mr" from "title"
		And I select "Male" from "gender"
		And I press "Submit"
		Then I should see "Success"
		
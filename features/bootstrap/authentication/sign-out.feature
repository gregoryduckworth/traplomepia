Feature: Sign out
	Have the ability to logout when signed in

	@auth @sign-out
	Scenario: Sign out	
		Given I am logged in as "user@example.com"
		And I am on "/home"
		When I follow "user-menu" 
		And I follow "Sign Out" 
		Then I should see "AdminSite"
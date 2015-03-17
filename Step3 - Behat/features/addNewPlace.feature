#features/addNewPlace.feature
	#language en

Feature: addNewPlace

  to add a new place in sonar
  as a provider of it
  I want to obtain a new place

Scenario: Twitter requests a new place, Twitter no is a provider
	Given I am a provider called "twitter"
	And I have a identifier "600473460700"
	When I call add New Place
	Then I see "Place not obtained"

Scenario: Facebook requests a new place
	Given I am a provider called "facebook"
	And I have a identifier "100473940700"
	When I call add New Place
	Then I see "Place obtained"

Scenario: Facebook requests a new place with an identifier already registered in sonar
	Given I am a provider called "facebook"
	And I have a identifier "100473940700"
	And I have an place for the indentifier
	When I call add New Place
	Then I see "Place obtained"
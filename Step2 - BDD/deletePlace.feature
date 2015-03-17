#features/deletePlace.feature
	#language en

Feature: deletePlace

  	to delete a place in sonar
  	as a provider of it
  	I want delete the place


Scenario: Foursquare requests delete a inexistent place
	Given I am a provider called "foursquare" 
	And I have a identifier "4b7755f5f964a5200f932FFF"
  And I not have an place for the indentifier
	When I call delete Place
	Then I see "Place not deleted"

Scenario: Facebook requests delete a existent place
	Given I am a provider called "facebook" 
  	And I have a identifier "100473940700"
  	And I have an place for the indentifier
  	When I call delete Place
  	Then I see "Place deleted"
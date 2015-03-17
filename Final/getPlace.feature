#features/getPlace.feature
	#language en

Feature: getPlace

	to obtain the information of a place in sonar
  as a provider of it
	I want obtain the data of place

Scenario: Foursquare requests the data of a place existent by provider place id
	Given I am a provider called "foursquare" 
  	And I have a identifier "4b7755f5f964a5200f932ee3"
  	And I have an place for the indentifier
  	When I call get Place 
  	Then I see "Place obtained"

Scenario: Facebook requests the data of a place inexistent by provider place id
  	Given I am a provider called "facebook" 
  	And I have a identifier "100473940700"
  	And I not have an place for the indentifier
  	When I call get Place 
  	Then I see "Place not obtained"

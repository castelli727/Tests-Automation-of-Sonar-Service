#features/getPlaceBySonarId.feature
	#language en

Feature: getPlaceBySonarId

	to obtain the information of a place in sonar
  	as a client of it
  	I want obtain data of place

Scenario: Facebook requests the data of a existent place by sonar place id
  	Given I am a provider called "facebook"
	And I have a identifier "100473940700"
	And I have a place indentifier in sonar for this other
  	When I call get Place By Sonar PlaceId
  	Then I see "Place obtenid"
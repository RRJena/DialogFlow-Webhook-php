
<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody,true);
	$text = $json["queryResult"]["parameters"]["text"];

	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
   
	switch ($text) {
		case 'open hello':
			$speech='			
			{
“type”: 11,
“imageurl”: “https://placem.at/people?w=600&h=400 26”,
“title”: “This is my title”,
“subtitle”: “and here’s a subtitle, ooooohhhhh lovely”,
“buttons”: [
{
“label”: “This is a button”,
“postback”: “this is a button postback”
},
{
“label”: “This is ANOTHER button”,
“postback”: “this is ANOTHER button postback”
}
]
}';
			break;
		case 'bye':
			$speech = "PECO missing meter number details";
			break;
		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, can you please elobarate more";
			break;
	}
	//$response = new \stdClass();
	//$response->speech = "$speech";
	//$response->displayText = "$speech";
	//$response->source ='Procode.online';
	//$response->return = "$speech";
	//$response->backgroundColor = "red";
	//$response->fulfillmentText = "$speech";
	//$response->fulfillmentMessages->card->title = "$speech";
	//$response->fulfillmentMessages->card->subtitle = "HELLO RRJ";
	//$response->fulfillmentMessages->card->imgUri = "https://4.bp.blogspot.com/-nWLb7oT6HIs/WR20OJfHCrI/AAAAAAAAHng/pSaUk6CIclQJEyRvegGjNvAe8_RVIdFNgCKgB/s1600/IMG_20170516_174832_416.jpg";
	//$response = array("speech" => "$speech", "displayText" =>"$speech", "source" =>"PRocode", "fulfillmentText" =>"$speech");
	//echo json_encode($response);
	
	//trying to create a basic card
     
     
     
     //dummy and failure
   $response0='{
  "payload": {
    "google": {
      "expectUserResponse": true,
      "richResponse": {
        "items": [
          {
            "simpleResponse": {
              "textToSpeech": "Simple Response",
              "displayText": "<b>Howdy! I can tell you fun facts about almost any number. What do you have in mind?<b>"
            }
          },
          {
            "tableCard": {
              "rows": [
                {
                  "cells": [
                    {
                      "text": "row 1 item 1"
                    },
                    {
                      "text": "row 1 item 2"
                    },
                    {
                      "text": "row 1 item 3"
                    }
                  ],
                  "dividerAfter": true
                },
                {
                  "cells": [
                    {
                      "text": "row 2 item 1"
                    },
                    {
                      "text": "row 2 item 2"
                    },
                    {
                      "text": "row 2 item 3"
                    }
                  ],
                  "dividerAfter": true
                }
              ],
              "columnProperties": [
                {
                  "header": "header 1"
                },
                {
                  "header": "header 2"
                },
                {
                  "header": "header 3"
                }
              ]
            }
          }
        ]
      },
      "userStorage": "{\"data\":{}}"
    }
  }
}';

// real and success
/*
$response0='{
  "payload": {
    "google": {
      "expectUserResponse": true,
      "richResponse": {
  "items": [
    {
      "simpleResponse": {
          "textToSpeech":"This is the first simple response for a basic card"
      }
    },
    {
      "basicCard": {
        "title":"Title: this is a title",
        "formattedText":"This is a basic card.  Text in a\n      basic card can include \"quotes\" and most other unicode characters\n      including emoji 📱.  Basic cards also support some markdown\n      formatting like *emphasis* or _italics_, **strong** or __bold__,\n      and ***bold itallic*** or ___strong emphasis___ as well as other things\n      like line  \nbreaks",
        "subtitle":
        "This is a subtitle",
        "image": {
          "url":"https://developers.google.com/actions/images/badges/XPM_BADGING_GoogleAssistant_VER.png",
          "accessibilityText":"Image alternate text"
        },
        "buttons": [
          { 
            "title":"This is a button",
            "openUrlAction":{ 
              "url":"https://assistant.google.com/"
            }
          }
        ]
      }
    },
    {
      "simpleResponse": {
        "textToSpeech":"This is the 2nd simple response ",
        "displayText":"This is the 2nd simple response"
      }
    }
  ],
  "suggestions": 
  [
    {"title":"Basic Card"},
    {"title":"List"},
    {"title":"Carousel"},
    {"title":"Suggestions"}
  ]
}
}
}}


';
*/
//************************************************************************************



















  $response1=json_decode($response0,true);
  echo json_encode($response1);
  
	
	fwrite($myfile,json_encode($response));
   fclose($myfile);
   
   
   
   
   
   
   /*
  $response["data"]["google"]["expectUserResponse"]='false';
  $response["data"]["google"]["isSsml"]='false';
  $response["data"]["google"]["speech"]="$speech";
  $response["data"]["google"]["systemIntent"]["intent"]="actions.intent.TEXT";
  $response["data"]["google"]["systemIntent"]["intent"]="actions.intent.TEXT";
  */
  

  
   
   
   
   
   
   
   
   
   
   
}
else
{
	$speech = "Ok";
	$response->speech = "$speech";
	echo json_encode($response);
}
?>
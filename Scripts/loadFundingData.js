function loadData(){
console.log("Retrieveing Lesotho's Funding Data..");

var xmlhttp;

if (window.XMLHttpRequest){
  //Code for modern browsers
  xmlhttp = new XMLHttpRequest();
}else{
  //Code for old IE browsers
  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange = function(){
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
    //Handle the xml response
    retreivedDoc = xmlhttp.responseText;
    if (retreivedDoc){
      //Response
      res = '';
      res = retreivedDoc;
      var fundingData = JSON.parse(res);

      var amountFunded = fundingData[0].FundingAmount;
      console.log("Amount Funded: ", amountFunded);
      document.getElementById("amountFunded").innerHTML = "Amount Funded: £" + amountFunded;

      var destCountry = fundingData[0].CurrentDestination;
      console.log("Current Destination: ", destCountry);
      document.getElementById("currentDest").innerHTML = "Current Dest.: " + destCountry;

      var currentCountry = fundingData[0].CurrentPlace;
      console.log("Current Country: ", currentCountry);
      document.getElementById("currentPlace").innerHTML = "Current Country: " + currentCountry;

      var eventOne = fundingData[0].EventOne;
      console.log("Event 1: ", eventOne);
      document.getElementById("eventOne").innerHTML = eventOne;

      var eventTwo = fundingData[0].EventTwo;
      console.log("Event 2: " , eventTwo);
      document.getElementById("eventTwo").innerHTML = eventTwo;

      var eventThree = fundingData[0].EventThree;
      console.log("Event 3: ", eventThree);
      document.getElementById("eventThree").innerHTML = eventThree;

      console.log("Retrieved XML successfully");
    }else{
      console.log("Check the AJAX Request URL, because it's returning null.")
    }
  }
}

//GET requests could return a cached result, so to avoid this we use ?t=" + Math.random() after the url (random id)

var apiURL = "http://localhost:8888/Lesotho%20Project/db/service.php";
xmlhttp.open("GET", apiURL, true);
console.log("Retrieving Data from: ", apiURL);
xmlhttp.send();
}
loadData();

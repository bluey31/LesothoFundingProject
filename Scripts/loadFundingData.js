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
      var fundingdata = JSON.parse(res);

      var FundingAmount = fundingdata[0].FundingAmount;
      console.log("Amount Funded: ", FundingAmount);
      document.getElementById("FundingAmount").innerHTML = "£" + FundingAmount;
      document.querySelector('#p1').addEventListener('mdl-componentupgraded', function () {
        //This is to get a correct PERCENTAGE
          this.MaterialProgress.setProgress((FundingAmount/15000)* 100);
      });

      var CurrentLocation = fundingdata[0].CurrentLocation;
      console.log("CurrentLocation: ", CurrentLocation);
      document.getElementById("CurrentLocation").innerHTML = "Currently in: " + CurrentLocation;

      var Description = fundingdata[0].Description;
      console.log("Description: ", Description);
      document.getElementById("Description").innerHTML = Description;

      var EventOne = fundingdata[0].EventOne;
      console.log("Event 1: ", EventOne);
      document.getElementById("EventOne").innerHTML = EventOne;

      var EventTwo = fundingdata[0].EventTwo;
      console.log("Event 2: " , EventTwo);
      document.getElementById("EventTwo").innerHTML = EventTwo;

      var EventThree = fundingdata[0].EventThree;
      console.log("Event 3: ", EventThree);
      document.getElementById("EventThree").innerHTML =  EventThree;
        var TitleOne = fundingdata[0].TitleOne;
      console.log("Title 1: ", TitleOne);
      document.getElementById("TitleOne").innerHTML = TitleOne;

      var TitleTwo = fundingdata[0].TitleTwo;
      console.log("title 2: " , TitleTwo);
      document.getElementById("TitleTwo").innerHTML = TitleTwo;

      var TitleThree = fundingdata[0].TitleThree;
      console.log("title 3: ", TitleThree);
      document.getElementById("TitleThree").innerHTML =  TitleThree;

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

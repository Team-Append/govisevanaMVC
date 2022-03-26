function selectDistrict(province,district){
    var s1 = document.getElementById(province);
    var s2 = document.getElementById(district);
    s2.innerHTML = "";
    if(s1.value == "Western"){
      var optionArray = [" Colombo|Colombo" , " Gampaha|Gampaha","Kalutara|Kalutara"];
    } else if(s1.value == "Central"){
      var optionArray = ["Kandy|Kandy", " Matale| Matale","Nuwara Eliya|Nuwara Eliya"];
    } else if(s1.value == "Southern"){
      var optionArray = ["Galle|Galle","Hambantota|Hambantota", "Matara|Matara"];
    }else if(s1.value == "Uva"){
      var optionArray = ["Badulla|Badulla","Moneragala|Moneragala"];
    }else if(s1.value == "Sabaragamuwa"){
      var optionArray = ["Kegalle|Kegalle","Ratnapura|Ratnapura"];
    }else if(s1.value == "North Western"){
      var optionArray = ["Kurunegala|Kurunegala","Puttalam|Puttalam"];
    }else if(s1.value == "North Central"){
      var optionArray = ["Anuradhapura|Anuradhapura","Polonnaruwa|Polonnaruwa"];
    }else if(s1.value == "Nothern"){
      var optionArray = ["Jaffna|Jaffna","Kilinochchi|Kilinochchi","Mannar|Mannar","Mullaitivu|Mullaitivu","Vavuniya|Vavuniya"];
    }else if(s1.value == "Eastern"){
      var optionArray = ["Ampara|Ampara","Batticaloa|Batticaloa","Trincomalee|Trincomalee"];
    }
    for(var option in optionArray){
      var pair = optionArray[option].split("|");
      var newOption = document.createElement("option");
      newOption.value = pair[0];
      newOption.innerHTML = pair[1];
      s2.options.add(newOption);
    }
  }

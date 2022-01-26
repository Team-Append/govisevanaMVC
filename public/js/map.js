var selectedAreas = new Array();
$(document).on("click","#selectAll",function(){
    $("#slmap path").css("fill","#ee2f5b");
    var children = document.getElementById('slmap').children;
    for (var i = 0; i < children.length; i++) {
        var child = children[i];
        selectedAreas.push($(child).attr("title"));
      }
      var list = document.getElementById('selectedAreaList');
      list.textContent = '';
      for (var i = 0; i < selectedAreas.length; i++) {
        var entry = document.createElement('li');
        entry.appendChild(document.createTextNode(selectedAreas[i]));
        list.appendChild(entry);
    }  
    
    
});
$(document).on("click","#selectNone",function(){
    $("#slmap path").css("fill","#9E9E9E");
    selectedAreas = new Array();
    document.getElementById('selectedAreaList').textContent = '';
});
$(document).on("click","#slmap path",function(){
    $("#slmap path").css("fill","#9E9E9E");
    $(this).css("fill","#9E9E9E");
    var curIndex = selectedAreas.indexOf($(this).attr("title"));
    if (curIndex == -1){
        selectedAreas.push($(this).attr("title"))
    }else{
        selectedAreas.splice(curIndex,1);
    }
    var list = document.getElementById('selectedAreaList');
    list.textContent = '';
    for (var i = 0; i < selectedAreas.length; i++) {
        var entry = document.createElement('li');
        entry.appendChild(document.createTextNode(selectedAreas[i]));
        list.appendChild(entry);
        $( "path[title="+ selectedAreas[i]+"]" ).css("fill","#ee2f5b");
    }
    // $("#select").text("Selected "+ selectedAreas);
    // $("#distric").text($(this).attr("distric"));
    // $("#province").text($(this).attr("province"));
    // $("#map_hover").text("");
});

$(document).on("mousemove","#slmap path",function(){
    $("#map_hover").text($(this).attr("title"));
});
$('body').mousemove(function(){
    $("#map_hover").text("");
})



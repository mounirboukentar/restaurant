'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

var select = $("#mealSelector");
select.on("change",onChangeMeal);
var currentSelectedMeal;
$.getJSON(getRequestUrl()+"/meal?id=1",onReturnAjaxMeal);
var addMeal=$("#add");
addMeal.on("click",onClickAdd);
var totalOrder = 0;
tableau=loadData();
Display();



function onChangeMeal(){
    var option = $("#mealSelector option:selected").val();
    $.getJSON(getRequestUrl()+"/meal?id="+option,onReturnAjaxMeal);
    console.log(getRequestUrl()+"/meal?id="+option);
}

function onReturnAjaxMeal(meal){

    currentSelectedMeal= meal;
    var div =$("#choice");
    var image = $("<img>");
    div.text(meal.description+" "+meal.salePrice+"€");
    image.attr("src",getWwwUrl()+meal.photo);
    div.append(image);
}
var tableau = [];
function loadData() {
    var tableau = loadDataFromDomStorage("panier");
    if (tableau == null) {
        tableau = [];
    }
    return tableau
}

function onClickAdd(){

    var quantity = parseInt($("#quantity").val());
    var mealToEdit= tableau.find(function(obj){
        return obj.name === currentSelectedMeal.name;
    }
    );
    if(mealToEdit != undefined)
    {
        mealToEdit.quantity += quantity;
    }
    else
    {
        currentSelectedMeal.quantity= quantity;
        tableau.push(currentSelectedMeal);
    }
    saveDataToDomStorage("panier",tableau);
    Display();
}
function Display(){
    $("#liste").empty();

    var ul = $("<ul>");
    $("#liste").append(ul);

    var index = 0;
    totalOrder = 0;
    tableau.forEach(function(article){
        var li = $("<li>");
        var del = $('<button id="supprimer"><i class="fa fa-trash" aria-hidden="true"></i></button>');
        li.text(article.name +" "+article.quantity+ " " +article.salePrice+"€"+" "+article.quantity*article.salePrice+"€");
        totalOrder += parseInt(article.salePrice)*parseInt(article.quantity);
        li.append(del);
        ul.append(li);
        del.on("click",deleteMeal);
        del.data("position",index);
        index++;
    });


}

function deleteMeal(){
    tableau=loadData();
   tableau.splice($(this).data("position"),1);
    saveDataToDomStorage("panier",tableau);
    Display();
}

var Valider =  $("#valider");
Valider.on("click",onValiderCommande);

function onValiderCommande(){
    tableau=loadData();
    console.log(totalOrder);
    var data =
    {
        "panier":tableau,
        "totalOrder" : totalOrder
    };
    $.post(getRequestUrl()+"/basket",data,onReturnCommande);
}

function onReturnCommande(id){

    window.location.assign(getRequestUrl()+'/validation?id='+JSON.parse(id));
}
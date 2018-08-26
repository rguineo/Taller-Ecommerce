
var item = 0
var itemLi = $("#paginacion li")
var pausa = false

anchoUl = itemLi.length * 100
anchoLi = 100 / itemLi.length
$(".slider ul").css("min-width", anchoUl + "%")
$(".slider li").css("width", anchoLi + "%")


$("#paginacion li").click(function () {

	item = $(this).attr("item") - 1

	animarSlider(item)

})

function animarSlider(item) {
	$("#slider ul").animate({
		"left" : item * -100 + "%"

	}, 1000)

	$(itemLi).css("opacity", .4)
	$(itemLi[item]).css("opacity", .9)
	pausa = true
}

function play() {
	if(item == itemLi.length -1) {
		item = 0
	} else {
		item++
	}
	animarSlider(item)
}
$("#right").click(function() { 	play() })
$("#left").click(function() {
	if(item == 0) {
		item = itemLi.length -1
	} else {
		item--
	}
	animarSlider(item)
})
setInterval(function() {

	if (pausa) {
		pausa = false
	} else {
		play()	
	}

}, 3000)
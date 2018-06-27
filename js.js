/**
 * Author: Fatima Aurelia
 * Date: 01/22/2017
 * Version: 1.0
 */

 document.addEventListener('click', function (e) {
    e = e || window.event;
    var target = e.target || e.srcElement;

    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'modal') {
        if (target.hasAttribute('data-target')) {
            var m_ID = target.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('open');
            e.preventDefault();
        }
    }

    // Close modal window with 'data-dismiss' attribute or when the backdrop is clicked
    if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'modal') || target.classList.contains('modal')) {
        var modal = document.querySelector('[class="modal open"]');
        modal.classList.remove('open');
        e.preventDefault();
    }
}, false);



// 3 Sabores
 var w = 400;
 var h = 400;
 var r = h / 2;
 var aColor = [
 'rgb(178, 55, 56)',
 'rgb(213, 69, 70)',
 'rgb(230, 125, 126)',
 'rgb(239, 183, 182)'
 ]

 var data = [{
    "label": "Colorectale levermetastase (n=336)",
    "value": 33
},
{
    "label": "Levensmetatase van andere origine (n=32)",
    "value": 33
},
{
    "label": "Beningne levertumor (n=34)",
    "value": 33
}
];


var vis = d3.select('#chart').append("svg:svg").data([data]).attr("width", w).attr("height", h).append("svg:g").attr("transform", "translate(" + r + "," + r + ")");

var pie = d3.layout.pie().value(function(d) {
  return d.value;
});

// Declare an arc generator function
var arc = d3.svg.arc().outerRadius(r);

// Select paths, use arc generator to draw
var arcs = vis.selectAll("g.slice").data(pie).enter().append("svg:g").attr("class", "slice");
arcs.append("svg:path")
.attr("fill", function(d, i) {
    return aColor[i];
})
.attr("d", function(d) {
    return arc(d);
});

// Add the text
arcs.append("svg:text")
.attr("transform", function(d) {
    d.innerRadius = 100;
    d.outerRadius = r;
    return "translate(" + arc.centroid(d) + ")";
})
.attr("text-anchor", "middle")
.text(function(d, i) {
    return data[i].value + 'pIZZASSSSSS';
});

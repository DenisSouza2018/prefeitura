drawChartJsLine();
drawChartJsBar();
drawChartJsPie();
drawChartJsDoughnut();
drawChartJsPolar();
drawChartJsRadar();

drawD3JsLine('#d3JsLine');
drawD3JsBar('#d3JsBar');
drawD3JsPie("#d3JsPie");

function drawD3JsPie(selector){
  
}

function drawD3JsBar(selector) {
  var info = packData({
    labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
    datasets: [{
      label: 'GDP Per Capita  in $ (2015)',
      data: [1080, 3144, 9630, 34819, 55805, 85253, 132099],
      backgroundColor: [
          "#FF6384",
          "#36A2EB",
          "#FFCE56",
          "#AA6384",
          "#2CA21B",
          "#678E86",
          "#FFAE86"
        ]
    }]
  });
  var data = info.data;

  // ########   hard coded and dynamically calculated attributes  #######

  var attrs = {
    titleText: info.title,
    svgWidth: 500,
    svgHeight: 500,
    marginLeft: 70,
    marginBottom: 70,
    marginRight: 20,
    marginTop: 20,
    textColor: '#7f7777',
    fontSize: '13px',
    xTextRotation: 40,
    axisColor: '#877676',
    tickLineStrokeWidth: 0.2,
    rectColor:'#FF6384',
    animationDuration: 2200,
    animationEase: 'out',
    titleHeight: 30,
    rectWidth: 50,
    rectHeight: 15,
    titleTextTopMargin: 12,
    tooltipTextColor: 'white',
    tooltipBackgroundColor: 'black',
    marginBetweenBars:13,
    initialLayerBarOpacity:0
  }

  var dynamic = {}
  dynamic.chartWidth = attrs.svgWidth - attrs.marginLeft - attrs.marginRight
  dynamic.chartHeight = attrs.svgHeight - attrs.marginTop - attrs.marginBottom - attrs.titleHeight
  dynamic.rectLeftMargin = dynamic.chartWidth * 0.25;
  dynamic.titleTextLeftmargin = dynamic.rectLeftMargin + attrs.rectWidth + 10
  dynamic.chartTopMargin = attrs.marginTop + attrs.titleHeight
  dynamic.barWidth = dynamic.chartWidth/(data.length)-attrs.marginBetweenBars
  dynamic.barCellLeftMargin = attrs.marginBetweenBars/2;
  dynamic.xAxisTextLeftMargin = dynamic.chartWidth/(data.length*2)

  //  ##############     SCALES     #########
  var xScale = d3.scale.linear()
    .domain([0, data.length ])
    .range([0, dynamic.chartWidth]);

  var yScale = d3.scale.linear()
    .domain([0, d3.max(data, function(d) {
      return d.value;
    }) * 1.1])
    .range([dynamic.chartHeight, 0])

  //  ##############   AXES   ###############
  var xAxis = d3.svg.axis()
    .scale(xScale)
    .outerTickSize(0)
    .innerTickSize(-dynamic.chartHeight)
    .ticks(data.length)
    .tickFormat(function(index) {
      if (index < data.length) return data[index].label;
    })
    .orient('bottom');

  var yAxis = d3.svg.axis()
    .scale(yScale)
    .outerTickSize(0)
    .innerTickSize(-dynamic.chartWidth)
    .orient('left');



  //  ########### RESPONSIVE SVG DRAWING  ##############
  var svg = d3.select(selector)
    .append('svg')
    .attr("viewBox", "0 0 " + attrs.svgWidth + " " + attrs.svgHeight)
    .attr("preserveAspectRatio", "xMidYMid meet")

  // ############   TITLE BLOCK DRAWING  ##############
  var title = svg.append('g')
    .attr('width', dynamic.chartWidth)
    .attr('height', attrs.titleHeight)
    .attr('transform', 'translate(0,' + attrs.marginTop + ')');

  title.append('rect')
    .attr('x', dynamic.rectLeftMargin)
    .attr('width', attrs.rectWidth)
    .attr('height', attrs.rectHeight)
    .attr('fill', attrs.rectColor)

  title.append('text')
    .attr('x', dynamic.titleTextLeftmargin)
    .attr('y', attrs.titleTextTopMargin)
    .text(attrs.titleText)
    .attr('fill', attrs.textColor)

  //   #################  CHART CONTENT DRAWING  ###############

  var chart = svg.append('g')
    .attr('width', dynamic.chartWidth)
    .attr('height', dynamic.chartHeight)
    .attr('transform', 'translate(' + attrs.marginLeft + ',' + dynamic.chartTopMargin + ')');

  
  //  #################  X AXIS AND LINES DRAWING  #################
  var xTicks = chart.append('g')
    .attr('class', 'x-axis')
    .call(xAxis)
    .attr('transform', 'translate(0,' + dynamic.chartHeight + ')')

  xTicks.select('.domain') .attr('stroke', attrs.axisColor)

  xTicks.selectAll('text')
    .attr("transform", "translate("+dynamic.xAxisTextLeftMargin+",0)"+" rotate(-" + attrs.xTextRotation + ") ")
    .attr('fill', attrs.textColor)
    .attr('stroke', 'none')
    .style('text-anchor', 'end')
    .style('font-size', attrs.fontSize)

  //  #################  Y AXIS AND LINES DRAWING  #################

  var yTicks = chart.append('g')
    .attr('class', 'y-axis')
    .call(yAxis)

  yTicks.select('.domain')
    .attr('stroke', attrs.axisColor)

  yTicks.selectAll('text')
    .attr('fill', attrs.textColor)
    .attr('stroke', 'none')
    .style('font-size', attrs.fontSize)
    .attr('transform', 'translate(-5,0)')

  d3.selectAll('.tick line')
    .attr('stroke', 'gray')
    .attr('stroke-width', attrs.tickLineStrokeWidth)

  // ########### BARS DRAWING  ########

  var body = chart.append('g');

 
   
   
   
  var bars =  body.selectAll('.bar')
    .data(data)
    .enter()
    .append('rect')
    .attr('class', 'bar')
    .attr('x', function(d, i) {
      return xScale(i)+dynamic.barCellLeftMargin;
    })
    .attr('y', function(d) {
     return dynamic.chartHeight;
    })
    .attr('width', dynamic.barWidth)
      .attr('fill', function(d){
      return d.backgroundColor;
    })
    .attr('stroke', attrs.pointStrokeColor)
   
    .attr('height',0)
  .attr("transform",function(d){
      return 'translate(0,0)';
    })
   .transition()
    .duration(attrs.animationDuration)
    .attr('height',function(d){
        return dynamic.chartHeight-yScale(d.value);
    })
  .attr("transform",function(d){
      return 'translate(0,'+(yScale(d.value)-dynamic.chartHeight)+')';
    })

  
   body.selectAll('.layer-bar')
    .data(data)
    .enter()
    .append('rect')
    .attr('class', 'layer-bar')
    .attr('x', function(d, i) {
      return xScale(i)+dynamic.barCellLeftMargin;
    })
    .attr('y', function(d) {
     return dynamic.chartHeight;
    })
    .attr('width', dynamic.barWidth)
      .attr('fill', 'black')
    .style('cursor', 'pointer')
    .attr('stroke', attrs.pointStrokeColor)
    .attr('height',0)
  .attr('fill-opacity',attrs.initialLayerBarOpacity)
  .attr("transform",function(d){
      return 'translate(0,0)';
    })
   .transition()
    .duration(attrs.animationDuration)
    .attr('height',function(d){
        return dynamic.chartHeight-yScale(d.value);
    })
  .attr("transform",function(d){
      return 'translate(0,'+(yScale(d.value)-dynamic.chartHeight)+')';
    })
 
  



    


 
    

  //  ################   ADDING TOOLTIP ##################
  var div = d3.select("body")
    .append("div")
    .attr("class", "tooltip")
    .style("opacity", 0)
    .style("position", 'absolute')
    .style("text-align", 'left')
    .style("font", '12px sans-serif')
    .style("background", attrs.tooltipBackgroundColor)
    .style("padding", '5px')
    .style("color", attrs.tooltipTextColor)
    .style("border", '0px')
    .style("border-radius", '4px')
    .style("pointer-events", 'none')

  body.selectAll('.layer-bar')
    .on("mouseover", function(d, i) {
      var buffer = d.value.toString().length;
      if (i > data.length / 2) {
        buffer = -buffer - 200;
      } else {
        buffer *= 4;
      }
      div.transition()
        .duration(100)
        .style("opacity", .9);
      div.html("<b>" + d.label + "</b><br/>" + attrs.titleText + ' : ' + d.value)
        .style("left", (d3.event.pageX + buffer) + "px")
        .style("top", (d3.event.pageY - 28) + "px");

      var bar = d3.select(this).attr('fill-opacity',0.3)

    })
    .on("mouseout", function(d) {
      div.transition()
        .duration(200)
        .style("opacity", 0);

      var bar = d3.select(this)
      .attr('fill-opacity',attrs.initialLayerBarOpacity)
        
    });

}

function drawD3JsLine(selector) {
  var info = packData({
    labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
    datasets: [{
      label: 'GDP Per Capita in $  (2015)',
      data: [1080, 3144, 9630, 34819, 55805, 85253, 132099]
    }]
  });
  var data = info.data;

  // ########   hard coded and dynamically calculated attributes  #######

  var attrs = {
    titleText: info.title,
    svgWidth: 500,
    svgHeight: 500,
    marginLeft: 70,
    marginBottom: 70,
    marginRight: 20,
    marginTop: 20,
    textColor: '#7f7777',
    fontSize: '13px',
    lineColor: '#b8bfc4',
    lineWidth: 3,
    xTextRotation: 40,
    axisColor: '#877676',
    tickLineStrokeWidth: 0.2,
    pointRadius: 4,
    pointColor: '#b7a7a7',
    pointStrokeColor: '#a09090',
    pointHoverStroke: '#20ccf7',
    pointHoverStrokeWidth: 3,
    pointHoverFill: 'white',
    pointHoverRadiusZoomingIndex: 2,
    areaFillOpacity: 0.2,
    areaColor: 'gray',
    animationDuration: 1200,
    animationEase: 'out',
    titleHeight: 30,
    rectWidth: 50,
    rectHeight: 15,
    titleTextTopMargin: 12,
    tooltipTextColor: 'white',
    tooltipBackgroundColor: 'black',

  }

  var dynamic = {}
  dynamic.chartWidth = attrs.svgWidth - attrs.marginLeft - attrs.marginRight
  dynamic.chartHeight = attrs.svgHeight - attrs.marginTop - attrs.marginBottom - attrs.titleHeight
  dynamic.rectLeftMargin = dynamic.chartWidth * 0.25;
  dynamic.titleTextLeftmargin = dynamic.rectLeftMargin + attrs.rectWidth + 10
  dynamic.chartTopMargin = attrs.marginTop + attrs.titleHeight

  //  ##############     SCALES     #########
  var xScale = d3.scale.linear()
    .domain([0, data.length - 1])
    .range([0, dynamic.chartWidth]);

  var yScale = d3.scale.linear()
    .domain([0, d3.max(data, function(d) {
      return d.value;
    }) * 1.1])
    .range([dynamic.chartHeight, 0])

  //  ##############   AXES   ###############
  var xAxis = d3.svg.axis()
    .scale(xScale)
    .outerTickSize(0)
    .innerTickSize(-dynamic.chartHeight)
    .ticks(data.length)
    .tickFormat(function(index) {
      if (index < data.length) return data[index].label;
    })
    .orient('bottom');

  var yAxis = d3.svg.axis()
    .scale(yScale)
    .outerTickSize(0)
    .innerTickSize(-dynamic.chartWidth)
    .orient('left');

  //  ##########     LINE AND AREA PATH D3 FUNCS  #######
  var line = d3.svg.line()
    .x(function(d, i) {
      return xScale(i)
    })
    .y(function(d) {
      return yScale(d.value)
    })
    .interpolate("cardinal")

  var area = d3.svg.area()
    .x(function(d, i) {
      return xScale(i)
    })
    .y0(dynamic.chartHeight)
    .y1(function(d) {
      return yScale(d.value)
    }).interpolate("cardinal")

  //  ########### RESPONSIVE SVG DRAWING  ##############
  var svg = d3.select(selector)
    .append('svg')
    .attr("viewBox", "0 0 " + attrs.svgWidth + " " + attrs.svgHeight)
    .attr("preserveAspectRatio", "xMidYMid meet")

  // ############   TITLE BLOCK DRAWING  ##############
  var title = svg.append('g')
    .attr('width', dynamic.chartWidth)
    .attr('height', attrs.titleHeight)
    .attr('transform', 'translate(0,' + attrs.marginTop + ')');

  title.append('rect')
    .attr('x', dynamic.rectLeftMargin)
    .attr('width', attrs.rectWidth)
    .attr('height', attrs.rectHeight)
    .attr('fill', attrs.areaColor)
    .attr('fill-opacity', attrs.areaFillOpacity)
    .attr('stroke', attrs.lineColor)
    .attr('stroke-width', attrs.lineWidth)

  title.append('text')
    .attr('x', dynamic.titleTextLeftmargin)
    .attr('y', attrs.titleTextTopMargin)
    .text(attrs.titleText)
    .attr('fill', attrs.textColor)

  //   #################  CHART CONTENT DRAWING  ###############

  var chart = svg.append('g')
    .attr('width', dynamic.chartWidth)
    .attr('height', dynamic.chartHeight)
    .attr('transform', 'translate(' + attrs.marginLeft + ',' + dynamic.chartTopMargin + ')');

  //  #################  X AXIS AND LINES DRAWING  #################
  var xTicks = chart.append('g')
    .attr('class', 'x-axis')
    .call(xAxis)
    .attr('transform', 'translate(0,' + dynamic.chartHeight + ')')

  xTicks.select('.domain')
    .attr('stroke', attrs.axisColor)

  xTicks.selectAll('text')
    .attr("transform", "rotate(-" + attrs.xTextRotation + ") ")
    .attr('fill', attrs.textColor)
    .attr('stroke', 'none')
    .style('text-anchor', 'end')
    .style('font-size', attrs.fontSize)

  //  #################  Y AXIS AND LINES DRAWING  #################

  var yTicks = chart.append('g')
    .attr('class', 'y-axis')
    .call(yAxis)

  yTicks.select('.domain')
    .attr('stroke', attrs.axisColor)

  yTicks.selectAll('text')
    .attr('fill', attrs.textColor)
    .attr('stroke', 'none')
    .style('font-size', attrs.fontSize)
    .attr('transform', 'translate(-5,0)')

  d3.selectAll('.tick line')
    .attr('stroke', 'gray')
    .attr('stroke-width', attrs.tickLineStrokeWidth)

  // ########### LINE , AREA AND POINTS DRAWING  ########

  var body = chart.append('g');

  var linePart = body.append('path')
    .datum(data)
    .attr('class', 'line')
    .attr('d', line)
    .attr('fill', 'none')
    .attr('stroke', attrs.lineColor)
    .attr('stroke-width', attrs.lineWidth)

  var areaPart = body.append('path')
    .datum(data)
    .attr('class', 'area')
    .attr('d', area)
    .attr('fill', attrs.areaColor)
    .attr('fill-opacity', attrs.areaFillOpacity)

  body.selectAll('.point')
    .data(data)
    .enter()
    .append('circle')
    .attr('class', 'point')
    .attr('cx', function(d, i) {
      return xScale(i);
    })
    .attr('cy', function(d) {
      return yScale(d.value);
    })
    .attr('r', function(d) {
      return attrs.pointRadius
    })
    .attr('fill', attrs.pointColor)
    .attr('stroke', attrs.pointStrokeColor)
    .style('cursor', 'pointer')
  
  
  //############### ADDING STARTUP ANIMATIONS ###############

  var startData = data.map(function() {
    return {
      value: 0
    }
  });
  

  body.selectAll('.point').transition()
    .duration(attrs.animationDuration)
    .ease(attrs.animationEase)
    .attrTween("cy", function(d, i) {
      return d3.interpolateNumber(yScale(0), yScale(d.value));
    });

  areaPart.transition()
    .duration(attrs.animationDuration)
    .ease(attrs.animationEase)
    .attrTween("d", function() {
      debugger;
      var interpolator = d3.interpolateArray(startData, data);
      return function(t) {
        return area(interpolator(t));
      }
    });

  linePart.transition()
    .duration(attrs.animationDuration)
    .ease(attrs.animationEase)
    .attrTween("d", function() {
      var interpolator = d3.interpolateArray(startData, data);
      return function(t) {
        return line(interpolator(t));
      }
    });

  //  ################   ADDING TOOLTIP ##################
  var div = d3.select("body")
    .append("div")
    .attr("class", "tooltip")
    .style("opacity", 0)
    .style("position", 'absolute')
    .style("text-align", 'left')
    .style("font", '12px sans-serif')
    .style("background", attrs.tooltipBackgroundColor)
    .style("padding", '5px')
    .style("color", attrs.tooltipTextColor)
    .style("border", '0px')
    .style("border-radius", '4px')
    .style("pointer-events", 'none')

  body.selectAll('.point')
    .on("mouseover", function(d, i) {
      var buffer = d.value.toString().length;
      if (i > data.length / 2) {
        buffer = -buffer - 200;
      } else {
        buffer *= 4;
      }
      div.transition()
        .duration(100)
        .style("opacity", .9);
      div.html("<b>" + d.label + "</b><br/>" + attrs.titleText + ' : ' + d.value)
        .style("left", (d3.event.pageX + buffer) + "px")
        .style("top", (d3.event.pageY - 28) + "px");

      var point = d3.select(this);

      point.attr('r', point.attr('r') * attrs.pointHoverRadiusZoomingIndex)
      point.attr('stroke', attrs.pointHoverStroke)
        .attr('stroke-width', attrs.pointHoverStrokeWidth)
        .attr('fill', attrs.pointHoverFill)

    })
    .on("mouseout", function(d) {
      div.transition()
        .duration(200)
        .style("opacity", 0);

      var point = d3.select(this);

      point.attr('r', point.attr('r') / attrs.pointHoverRadiusZoomingIndex)
        .attr('fill', attrs.pointColor)
        .attr('stroke', attrs.pointStrokeColor)
        .attr('stroke-width', 1)
    });

}

function packData(p) {
  var data = p;
  var result = {
    title: data.datasets[0].label,
    data: []
  };

  data.labels.forEach(function(v) {
    result.data.push({
      label: v
    });
  });

  result.data.forEach(function(v, i) {
    v.value = data.datasets[0].data[i];

    if (data.datasets[0].backgroundColor) {
      v.backgroundColor = data.datasets[0].backgroundColor[i];
    }

    if (data.extras) {
      for (var attrname in data.extras[i]) {
        v[attrname] = data.extras[i][attrname];
      }
    }
  });

  return result;

}

function drawChartJsLine() {
  var ctxChartJsLine = document.getElementById("chartJsLine");
  var chartJsLine = new Chart(ctxChartJsLine, {
    type: 'line',
    data: {
      labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
      datasets: [{
        label: 'GDP Per Capita in $  (2015)',
        data: [1080, 3144, 9630, 34819, 55805, 85253, 132099],

      }]
    }
  });
}

function drawChartJsBar() {
  var ctxChartJsBar = document.getElementById("chartJsBar");
  var chartJsBar = new Chart(ctxChartJsBar, {
    type: 'bar',
    data: {
      labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
      datasets: [{
        label: 'GDP Per Capita in $  (2015)',
        data: [1080, 3144, 9630, 34819, 55805, 85253, 132099],
        backgroundColor: [
          "#FF6384",
          "#36A2EB",
          "#FFCE56",
          "#AA6384",
          "#2CA21B",
          "#678E86",
          "#FFAE86"
        ]
      }]
    }
  });
}

function drawChartJsPie() {
  var ctxChartJsPie = document.getElementById("chartJsPie");
  var chartJsPie = new Chart(ctxChartJsPie, {
    type: 'pie',
    data: {
      labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
      datasets: [{
        label: 'GDP Per Capita in $  (2015)',
        data: [1080, 3144, 9630, 34819, 55805, 85253, 132099],
        backgroundColor: [
          "#FF6384",
          "#36A2EB",
          "#FFCE56",
          "#AA6384",
          "#2CA21B",
          "#678E86",
          "#FFAE86"
        ]
      }]
    }
  });
}

function drawChartJsDoughnut() {
  var ctxChartJsDoughnut = document.getElementById("chartJsDoughnut");
  var chartJsDoughnut = new Chart(ctxChartJsDoughnut, {
    type: 'doughnut',
    data: {
      labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
      datasets: [{
        label: 'GDP Per Capita in $  (2015)',
        data: [1080, 3144, 9630, 34819, 55805, 85253, 132099],
        backgroundColor: [
          "#FF6384",
          "#36A2EB",
          "#FFCE56",
          "#AA6384",
          "#2CA21B",
          "#678E86",
          "#FFAE86"
        ]
      }]
    }
  });
}

function drawChartJsPolar() {
  var ctxChartJsPolar = document.getElementById("chartJsPolar");
  var chartJsPolar = new Chart(ctxChartJsPolar, {
    type: 'polarArea',
    data: {
      labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
      datasets: [{
        label: 'GDP Per Capita in $  (2015)',
        data: [1080, 3144, 9630, 34819, 55805, 85253, 132099],
        backgroundColor: [
          "#FF6384",
          "#36A2EB",
          "#FFCE56",
          "#AA6384",
          "#2CA21B",
          "#678E86",
          "#FFAE86"
        ]
      }]
    }
  });
}

function drawChartJsRadar() {
  var ctxChartJsRadar = document.getElementById("chartJsRadar");
  var chartJsRadar = new Chart(ctxChartJsRadar, {
    type: 'radar',
    data: {
      labels: ["Niger", "Cameroon", "Georgia", "Spain", "United States", "Singapore", "Qatar"],
      datasets: [{
        label: 'GDP Per Capita in $  (2015)',
        data: [1080, 3144, 9630, 34819, 55805, 85253, 132099]

      }]
    }
  });
}
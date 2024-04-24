/*window.onload = function () {
  var chart = new CanvasJS.Chart("AnnualSales",{
    animationEnabled: true,
    title:{
      text: ""
    }, 
    toolTip: {
      shared: true
    },
    legend: {
      cursor:"pointer",
      itemclick: toggleDataSeries
    },
    data: [{
      type: "column",
      name: "Product",
      legendText: "Product",
      showInLegend: true, 
      dataPoints:[
      { label: "2016-2017", y: 600.25 },
      { label: "2016-2017", y: 302.25 },
      { label: "2017-2018", y: 302.25 },
      ]
    },
    {
      type: "column", 
      name: "AMC",
      legendText: "AMC",
      axisYType: "secondary",
      showInLegend: true,
      dataPoints:[
      { label: "2016-2017", y: 600.25 },
      { label: "2016-2017", y: 302.25 },
      { label: "2017-2018", y: 302.25 }
      ]
    },
    {
      type: "column", 
      name: "LICENCE",
      legendText: "LICENCE",
      axisYType: "secondary",
      showInLegend: true,
      dataPoints:[
      { label: "2016-2017", y: 600.25 },
      { label: "2016-2017", y: 302.25 },
      { label: "2017-2018", y: 302.25 },
      ]
    }]
  });

  /*var annualSales = new CanvasJS.Chart("annualSalesCirle", {
    exportEnabled: false,
    animationEnabled: true,
    title:{
      text: "ANNUAL SALES"
    },
    legend:{
      cursor: "pointer",
      itemclick: explodePie
    },
    data: [{
      type: "pie",
      showInLegend: true,
      toolTipContent: "{name}: <strong>{y}%</strong>",
      indexLabel: "{name} - {y}%",
      dataPoints: [
      { y: 26, name: "Total Sale Amount", exploded: true },
      { y: 20, name: "Total AMC Amount" },
      { y: 5, name: "Total Licence Amount" },
      ]
    }]
  });*/

  /*var PRODUCT_WISE_MONTHLY_RECEIVABLES = new CanvasJS.Chart("PRODUCT_WISE_MONTHLY_RECEIVABLES", {
    animationEnabled: false,
    exportEnabled: false,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
          text: ""
        },
        axisX:{
          reversed: true
        },
        toolTip:{
          shared: true
        },
        data: [{
          type: "stackedBar",
          name: "Received",
          dataPoints: [{"label":"Product Cost","y":100},{"label":"AMC Cos","y":200},{"label":"Licence Cos","y":200}]
        },{
          type: "stackedBar",
          name: "Pending",
          indexLabel: "#total",
          indexLabelPlacement: "outside",
          indexLabelFontSize: 15,
          indexLabelFontWeight: "bold",
          dataPoints: [{"label":"Product Cost","y":51},{"label":"AMC Cos","y":41},{"label":"Licence Cos","y":38}]
        }]
      });

  var productVsProject = new CanvasJS.Chart("productVsProject", {
    exportEnabled: false,
    animationEnabled: true,
    title:{
      text: "PRODUCT vs PROJECT"
    },
    legend:{
      cursor: "pointer",
      itemclick: explodePie
    },
    data: [{
      type: "pie",
      showInLegend: true,
      toolTipContent: "{name}: <strong>{y}%</strong>",
      indexLabel: "{name} - {y}%",
      dataPoints: [
      { y: 26, name: "Product", exploded: true },
      { y: 20, name: "Project" },
      ]
    }]
  });
  
  /*annualSales.render();*/

  /*chart.render();

  productVsProject.render();
  PRODUCT_WISE_MONTHLY_RECEIVABLES.render();

  function toggleDataSeries(e) {
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
      e.dataSeries.visible = false;
    }
    else {
      e.dataSeries.visible = true;
    }
    chart.render();
  }


  function explodePie (e) {
    if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
      e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
      e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart.render();
  }
}*/
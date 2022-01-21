@section('title', 'Dashboard Simok ( Sistem Informasi Manajemen Ormas Kemasyarakatan )')
@extends('layout.main')
@section('content')
<!-- BEGIN: Content-->
 <div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
          <!-- Stats -->
          <div class="row">
              <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                      <div class="card-content">
                          <div class="media align-items-stretch">
                              <div class="p-2 text-center bg-primary bg-darken-2">
                                  <i class="icon-user font-large-2 white"></i>
                              </div>
                              <div class="p-2 bg-gradient-x-primary white media-body">
                                  <h5>Total Ormas</h5>
                                  <h5 class="text-bold-400 mb-0"><i class="feather icon-user"></i> 28</h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                      <div class="card-content">
                          <div class="media align-items-stretch">
                              <div class="p-2 text-center bg-danger bg-darken-2">
                                  <i class="feather icon-activity font-large-2 white"></i>
                              </div>
                              <div class="p-2 bg-gradient-x-danger white media-body">
                                  <h5>Total Kegiatan Ormas</h5>
                                  <h5 class="text-bold-400 mb-0"><i class="feather icon-activity"></i> 1,238</h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                      <div class="card-content">
                          <div class="media align-items-stretch">
                              <div class="p-2 text-center bg-warning bg-darken-2">
                                  <i class="icon-basket-loaded font-large-2 white"></i>
                              </div>
                              <div class="p-2 bg-gradient-x-warning white media-body">
                                  <h5>New Orders</h5>
                                  <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-down"></i> 4,658</h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card">
                      <div class="card-content">
                          <div class="media align-items-stretch">
                              <div class="p-2 text-center bg-success bg-darken-2">
                                  <i class="icon-wallet font-large-2 white"></i>
                              </div>
                              <div class="p-2 bg-gradient-x-success white media-body">
                                  <h5>Total Profit</h5>
                                  <h5 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> 5.6 M</h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--/ Stats -->
          <!--Product sale & buyers -->
          <div class="row match-height">
              <div class="col-xl-8 col-lg-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Products Sales</h4>
                          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                          <div class="heading-elements">
                              <ul class="list-inline mb-0">
                                  <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                  <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="card-content">
                          <div class="card-body">
                              <div id="chartKegiatanOrmas" class="height-300"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Products Sales</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div id="chartdiv" class="height-300"></div>
                    </div>
                </div>
              </div>
          </div>
          <!--/ Product sale & buyers -->
      </div>
  </div>
</div>
<!-- END: Content-->
@endsection

@push('js')

<!-- Chart code -->
<script>
/**
 * ---------------------------------------
 * This demo was created using amCharts 5.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v5/
 * ---------------------------------------
 */

// Create root2 element
// https://www.amcharts.com/docs/v5/getting-started/#Root2_element
var root2 = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root2.setThemes([
  am5themes_Animated.new(root2)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root2.container.children.push(am5xy.XYChart.new(root2, {
  panX: false,
  panY: false,
  wheelX: "none",
  wheelY: "none"
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root2, {}));
cursor.lineY.set("visible", false);

// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root2, { minGridDistance: 30 });

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root2, {
  maxDeviation: 0,
  categoryField: "name",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root2, {})
}));

xRenderer.grid.template.set("visible", false);

var yRenderer = am5xy.AxisRendererY.new(root2, {});
var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root2, {
  maxDeviation: 0,
  min: 0,
  extraMax: 0.1,
  renderer: yRenderer
}));

yRenderer.grid.template.setAll({
  strokeDasharray: [2, 2]
});

// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root2, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "name",
  tooltip: am5.Tooltip.new(root2, { dy: -25, labelText: "{valueY}" })
}));


series.columns.template.setAll({
  cornerRadiusTL: 5,
  cornerRadiusTR: 5
});

series.columns.template.adapters.add("fill", (fill, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", (stroke, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

// Set data
var data = [
  {
    name: "John",
    value: 35654,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/A04.png" }
  },
  {
    name: "Damon",
    value: 65456,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/C02.png" }
  },
  {
    name: "Patrick",
    value: 45724,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/D02.png" }
  },
  {
    name: "Mark",
    value: 13654,
    bulletSettings: { src: "https://www.amcharts.com/lib/images/faces/E01.png" }
  }
];

series.bullets.push(function() {
  return am5.Bullet.new(root2, {
    locationY: 1,
    sprite: am5.Picture.new(root2, {
      templateField: "bulletSettings",
      width: 50,
      height: 50,
      centerX: am5.p50,
      centerY: am5.p50,
      shadowColor: am5.color(0x000000),
      shadowBlur: 4,
      shadowOffsetX: 4,
      shadowOffsetY: 4,
      shadowOpacity: 0.6
    })
  });
});

xAxis.data.setAll(data);
series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);
</script>



{{-- GRAFIK KEGIATAN ORMAS --}}
<script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartKegiatanOrmas");
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    var data = [{
      name: "Monica",
      steps: 45688,
      pictureSettings: {
        src: "https://www.amcharts.com/wp-content/uploads/2019/04/monica.jpg"
      }
    }, {
      name: "Joey",
      steps: 35781,
      pictureSettings: {
        src: "https://www.amcharts.com/wp-content/uploads/2019/04/joey.jpg"
      }
    }, {
      name: "Ross",
      steps: 25464,
      pictureSettings: {
        src: "https://www.amcharts.com/wp-content/uploads/2019/04/ross.jpg"
      }
    }, {
      name: "Phoebe",
      steps: 18788,
      pictureSettings: {
        src: "https://www.amcharts.com/wp-content/uploads/2019/04/phoebe.jpg"
      }
    }, {
      name: "Rachel",
      steps: 15465,
      pictureSettings: {
        src: "https://www.amcharts.com/wp-content/uploads/2019/04/rachel.jpg"
      }
    }, {
      name: "Chandler",
      steps: 11561,
      pictureSettings: {
        src: "https://www.amcharts.com/wp-content/uploads/2019/04/chandler.jpg"
      }
    }];
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
      am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "none",
        wheelY: "none",
        paddingBottom: 50,
        paddingTop: 40
      })
    );
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    
    var xRenderer = am5xy.AxisRendererX.new(root, {});
    xRenderer.grid.template.set("visible", false);
    
    var xAxis = chart.xAxes.push(
      am5xy.CategoryAxis.new(root, {
        paddingTop:40,
        categoryField: "name",
        renderer: xRenderer
      })
    );
    
    
    var yRenderer = am5xy.AxisRendererY.new(root, {});
    yRenderer.grid.template.set("strokeDasharray", [3]);
    
    var yAxis = chart.yAxes.push(
      am5xy.ValueAxis.new(root, {
        min: 0,
        renderer: yRenderer
      })
    );
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
      am5xy.ColumnSeries.new(root, {
        name: "Income",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "steps",
        categoryXField: "name",
        sequencedInterpolation: true,
        calculateAggregates: true,
        maskBullets: false,
        tooltip: am5.Tooltip.new(root, {
          dy: -30,
          pointerOrientation: "vertical",
          labelText: "{valueY}"
        })
      })
    );
    
    series.columns.template.setAll({
      strokeOpacity: 0,
      cornerRadiusBR: 10,
      cornerRadiusTR: 10,
      cornerRadiusBL: 10,
      cornerRadiusTL: 10,
      maxWidth: 50,
      fillOpacity: 0.8
    });
    
    var currentlyHovered;
    
    series.columns.template.events.on("pointerover", function (e) {
      handleHover(e.target.dataItem);
    });
    
    series.columns.template.events.on("pointerout", function (e) {
      handleOut();
    });
    
    function handleHover(dataItem) {
      if (dataItem && currentlyHovered != dataItem) {
        handleOut();
        currentlyHovered = dataItem;
        var bullet = dataItem.bullets[0];
        bullet.animate({
          key: "locationY",
          to: 1,
          duration: 600,
          easing: am5.ease.out(am5.ease.cubic)
        });
      }
    }
    
    function handleOut() {
      if (currentlyHovered) {
        var bullet = currentlyHovered.bullets[0];
        bullet.animate({
          key: "locationY",
          to: 0,
          duration: 600,
          easing: am5.ease.out(am5.ease.cubic)
        });
      }
    }
    
    var circleTemplate = am5.Template.new({});
    
    series.bullets.push(function (root, series, dataItem) {
      var bulletContainer = am5.Container.new(root, {});
      var circle = bulletContainer.children.push(
        am5.Circle.new(
          root,
          {
            radius: 34
          },
          circleTemplate
        )
      );
    
      var maskCircle = bulletContainer.children.push(
        am5.Circle.new(root, { radius: 27 })
      );
    
      // only containers can be masked, so we add image to another container
      var imageContainer = bulletContainer.children.push(
        am5.Container.new(root, {
          mask: maskCircle
        })
      );
    
      var image = imageContainer.children.push(
        am5.Picture.new(root, {
          templateField: "pictureSettings",
          centerX: am5.p50,
          centerY: am5.p50,
          width: 60,
          height: 60
        })
      );
    
      return am5.Bullet.new(root, {
        locationY: 0,
        sprite: bulletContainer
      });
    });
    
    // heatrule
    series.set("heatRules", [
      {
        dataField: "valueY",
        min: am5.color(0xe5dc36),
        max: am5.color(0x5faa46),
        target: series.columns.template,
        key: "fill"
      },
      {
        dataField: "valueY",
        min: am5.color(0xe5dc36),
        max: am5.color(0x5faa46),
        target: circleTemplate,
        key: "fill"
      }
    ]);
    
    series.data.setAll(data);
    xAxis.data.setAll(data);
    
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineX.set("visible", false);
    cursor.lineY.set("visible", false);
    
    cursor.events.on("cursormoved", function () {
      var dataItem = series.get("tooltip").dataItem;
      if (dataItem) {
        handleHover(dataItem);
      } else {
        handleOut();
      }
    });
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();
    chart.appear(1000, 100);
    
    }); // end am5.ready()
    </script>

    
@endpush
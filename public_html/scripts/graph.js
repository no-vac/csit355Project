var ctx = document.getElementById("myChart").getContext("2d");
function getnums(num) {
  var a = [];
  for (var i = 0; i < num; i++) {
    a.push(Math.floor(Math.random() * Math.floor(50000)));
  }
  return a;
}
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: "doughnut",

  // The data for our dataset
  data: {
    labels: ["Static", "Multi-Screen", "Live", "Interactive", "Hybrid"],
    datasets: [
      {
        label: "Orders Category Count",
        backgroundColor: "rgb(255, 99, 132)",
        borderColor: "rgb(255, 99, 132)",
        data: getnums(10)
      }
    ]
  },

  // Configuration options go here
  options: {}
});

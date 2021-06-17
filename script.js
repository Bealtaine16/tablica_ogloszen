const msnry = new Macy({
  container: '.gallery',
  mobileFirst: true,
  columns: 1,
  breakAt: {
    400: 2,
    700: 3,
    1100: 4,
  },
  margin: {
    x: 20,
    y: 20,
  }
})
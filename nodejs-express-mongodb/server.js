const express = require("express");
const bodyparser = require("body-parser");
const cors = require("cors");
const app = express();


var corsOptions = {
    origin: "http://localhost:8081"
};

app.use(cors(corsOptions));

//parse requests  of content-type  -application/json
app.use(bodyparser.json())

//parse requests of content-type  -application/x-www-form-urlencoded
app.use(bodyparser.urlencoded({ extended: true }))

//simple route
app.get("/", (req, res) => {
    res.json({ message: "Welcome to chiranjibi application." });
  });
  
  // set port, listen for requests
  const PORT = process.env.PORT || 8080;
  app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}.`);
  });
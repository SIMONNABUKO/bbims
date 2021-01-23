<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users PDF</title>
      <!-- Vendor CSS Files -->
    <style>
        body {
  background: rgb(204,204,204); 
}

page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  /* box-shadow: 0 0 0.5cm rgba(0,0,0,0.5); */
  
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: 0 auto;
    padding-top: 5%;
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.page{
    margin: 0 auto;
}
.heading{
    padding-left: 70px;
}
    </style>
</head>
<body>
    <page>
        <div class="page">
            <div class="heading"><h2>BBIS Users' Information</h2></div>
            <table class="styled-table">
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Blood Group</th>
                      <th>User Type</th>
                    </tr>
                  </thead>
                  <tbody>
                   

                    @if (count($users)> 0)
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->blood_type}}</td>
                            @if($user->is_patient)
                            <td>Patient</td>
                            @endif
                            @if($user->is_donor)
                            <td>Donor</td>
                            @endif
                            @if($user->is_blood_bank)
                            <td>Blood Bank</td>
                            @endif
                            @if(!$user->is_blood_bank && !$user->is_patient&& !$user->is_donor)
                              <td>---</td>
                              @endif
                            
                            
                           
                            
                           
                          </tr>
                        @endforeach
                    @endif
                  </tbody>
            </table>
        </div>
    </page>
<!-- Vendor JS Files -->

</body>
</html>
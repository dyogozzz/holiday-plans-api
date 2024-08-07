<!DOCTYPE html>
<html>
<head>
  <title>Holiday Plan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }

    .container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 800px;
      margin: 0 auto;
    }

    .title {
      font-size: 2em;
      color: #333333;
      margin-bottom: 10px;
    }

    .date, .location, .description {
      font-size: 1.2em;
      color: #666666;
      margin-bottom: 10px;
    }

    .participants {
      margin-top: 20px;
    }

    .participants h2 {
      font-size: 1.5em;
      color: #333333;
      margin-bottom: 10px;
    }

    .participants ul {
      list-style-type: none;
      padding: 0;
    }

    .participants li {
      font-size: 1.2em;
      color: #666666;
      margin-bottom: 5px;
    }

  </style>
</head>
<body>
  <div class="container">
    <h1 class="title">{{ $holidayPlan->title }}</h1>
    <p class="date"><strong>Date:</strong> {{ $holidayPlan->date }}</p>
    <p class="location"><strong>Location:</strong> {{ $holidayPlan->location }}</p>
    <p class="description"><strong>Description:</strong> {{ $holidayPlan->description }}</p>
    <div class="participants">
      <h2>Participants</h2>
      <ul>
        @foreach ($holidayPlan->participants as $participant)
          <li>{{ $participant }}</li>
        @endforeach
      </ul>
    </div>
  </div>
</body>
</html>
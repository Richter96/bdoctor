import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

import Chart from 'chart.js/auto';
import { getRelativePosition } from 'chart.js/helpers';

const ctx = document.getElementById('myChart');
fetch('/get-data')
  .then(response => response.json())
  .then(dataResponse => {
    const messageLabels = dataResponse.messageLabels;
    const messageData = dataResponse.messageData;
    const voteLabels = dataResponse.voteLabels;
    const voteData = dataResponse.voteData;
    const reviewLabels = dataResponse.reviewLabels;
    const reviewData = dataResponse.reviewData;

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: messageLabels,
        labels: voteLabels,
        labels: reviewLabels,
        datasets: [{
          label: 'Messages',
          data: messageData,
          borderWidth: 1
        },
        {
          label: 'Votes',
          data: voteData,
          borderWidth: 1
        },
        {
          label: 'Review',
          data: reviewData,
          borderWidth: 1
        },
      ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  })
  .catch(error => {
    console.error(error);
  });
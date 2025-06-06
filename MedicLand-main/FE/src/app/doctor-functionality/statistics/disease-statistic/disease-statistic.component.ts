import { Component, OnInit } from '@angular/core';
import Chart, { ChartTypeRegistry } from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels'; 
import { PatientService } from '../../../../services/patient.service';
import html2canvas from 'html2canvas';
import * as jsPDF from 'jspdf';

@Component({
  selector: 'app-disease-statistic',
  standalone: true,
  imports: [],
  providers: [PatientService],
  templateUrl: './disease-statistic.component.html',
  styleUrls: ['./disease-statistic.component.css']
})
export class DiseaseStatisticComponent implements OnInit {
  chart: Chart<"pie", number[], string> | undefined; 

  constructor(private patientService: PatientService) {}

  ngOnInit(): void {
    this.fetchDataAndCreateChart();
  }

  fetchDataAndCreateChart(): void {
    this.patientService.getChronicDiseaseCount().subscribe(
      (response) => {
        const labels = response.map((item: any) => item.diseaseName);
        const data = response.map((item: any) => item.patientCount);

        this.createChart(labels, data);
      },
      (error) => {
        console.error('Error fetching chronic disease statistics:', error);
      }
    );
  }

  createChart(labels: string[], data: number[]): void {
    Chart.register(ChartDataLabels);

    const totalPatients = data.reduce((sum, num) => sum + num, 0);
    const percentages = data.map(value => (value / totalPatients) * 100);


    this.chart = new Chart<"pie", number[], string>("MyChart", {
        type: 'pie',
        data: {
          labels: labels,
          datasets: [{
            label:  'Patients per Disease' ,
            data: percentages ,
            backgroundColor: [
              'red', 'pink', 'green', 'cyan', 'orange', 'blue', 'purple', 'lime'
            ],
            hoverOffset: 4
          }]
        },
        options: {
            aspectRatio: 2.5,
            plugins: {
                datalabels: {
                    color: '#fff',
                    font: {
                        size: 14,
                        weight: 'bold',
                    },
                    formatter: (value) => `${value.toFixed(2)}%`
                }
            }
        },
        plugins: [ChartDataLabels]
    });
  }

  generatePDF() {
    const data = document.getElementById('content');
    html2canvas(data!).then(canvas => {
        const imgWidth = 208;
        const imgHeight = canvas.height * imgWidth / canvas.width;
        const contentDataURL = canvas.toDataURL('image/png');
        const pdf = new jsPDF.jsPDF('p', 'mm', 'a4'); 
        const position = 0;
        pdf.addImage(contentDataURL, 'PNG', 0, position, imgWidth, imgHeight);
        pdf.save('exported-file.pdf');
    });
  }
}

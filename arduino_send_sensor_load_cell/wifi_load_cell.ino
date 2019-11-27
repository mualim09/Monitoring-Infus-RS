#include <SoftwareSerial.h> // memasukan library sofwareserial
SoftwareSerial wifi(10,11); // RX, TX
#include "HX711.h" //memasukan library HX711

#define DOUT  3 //mendefinisikan pin arduino yang terhubung dengan pin DT module HX711
#define CLK  2 //mendefinisikan pin arduino yang terhubung dengan pin SCK module HX711

HX711 scale(DOUT, CLK);

  float calibration_factor = 369; //nilai kalibrasi awal
float data;

#define WiFiSSID "GIC04"
#define WiFiPassword "qwerty123"
#define DestinationIP "192.168.0.2" // ip web thingspeak.com
#define TS_Key "8SHCIPVXZBEQRRY8" // api key dari thingspeak.com buat chanel untuk mendapatkanya

//int pinSensor = 5;
//int reading;
//float tempC;

boolean connected=false;

void setup(){ 
  wifi.begin(9600); 
  wifi.setTimeout(5000);
//  analogReference(INTERNAL); 
  Serial.begin(9600);
  scale.set_scale();
  scale.tare(); // auto zero / mengenolkan pembacaan berat 
  Serial.println("ESP8266 Client Demo"); 
//  delay(1000);
  
  //  periksa apakah modul ESP8266 aktif 
  wifi.println("AT+RST");
//  delay(1000);
  if(wifi.find("OK")){
    Serial.println("Modul siap");
  }else{
    Serial.println("Tidak ada respon dari modul");
    while(1);
  }
//  delay(1000);
  //setelah modul siap, kita coba koneksi sebanyak 5 kali
  for(int i=0;i<5;i++){ 
    connect_to_WiFi(); 
    if (connected){
      break;
    }
  }
  if (!connected){
    while(1);
  }
//  delay(2000);

  // set the single connection mode 
  wifi.println("AT+CIPMUX=0"); 
//  delay(1000);
}

void loop(){
  scale.set_scale(calibration_factor); //sesuaikan hasil pembacaan dengan nilai kalibrasi
  data = scale.get_units()*-1;
  String cmd = "AT+CIPSTART=\"TCP\",\"";
  cmd += DestinationIP ; 
  cmd += "\",80"; 
  wifi.println(cmd); Serial.println(cmd); if(wifi.find("Error"))
  {
    Serial.println("Koneksi error.");
    return;
  }

  //nilai_sensor = analogRead(sensorPin); // Anda bisa menggantinya dengan nilai analog.
  // dalam contoh ini, kita menggunakan nilai random 1...10 
  cmd = "GET /service/api/sensing?key=";
  cmd += TS_Key; 
  cmd +="&sn="; 
  cmd += "P001";
  cmd +="&berat="; 
  cmd += data;
  cmd += "\r\n";        // jangan lupa, setiap perintah selalu diakhiri dengan CR+LF
  wifi.print("AT+CIPSEND="); wifi.println(cmd.length()); 
  if(wifi.find(">")){ 
    Serial.print(">");
  }else{ 
    wifi.println("AT+CIPCLOSE"); Serial.println("koneksi timeout"); delay(1000);
    return;
  } 
  wifi.print(cmd); 
//  delay(2000);

  while (wifi.available()){
    char c = wifi.read(); Serial.write(c);
    if(c=='\r'){ 
      Serial.print('\n');
    }
  }
  Serial.println(data);
  delay(10000);
}

void connect_to_WiFi(){ 
  wifi.println("AT+CWMODE=1"); String cmd="AT+CWJAP=\""; 
    cmd+=WiFiSSID;
  cmd+="\",\"";
  cmd+=WiFiPassword; cmd+="\""; wifi.println(cmd); Serial.println(cmd); 
  if(wifi.find("OK")){
    Serial.println("Sukses, terkoneksi ke WiFi.");
    connected= true;
  }else{
    Serial.println("Tidak dapat terkoneksi ke WiFi. ");
    connected= false;
  }
}

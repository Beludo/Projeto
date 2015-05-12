#include <OneWire.h>
#include <DallasTemperature.h>

// Pino de dados: 2
#define PINO_BARRAMENTO 2
#define RESOLUCAO_TEMPERATURA 9

// Instanciar um objeto oneWire para comunicação com dispositivos one wire genéricos
OneWire oneWire(PINO_BARRAMENTO);

// Passar o objeto oneWire para a biblioteca Dallas Temperature. 
DallasTemperature sensors(&oneWire);

// Endereços dos sensores (arrays)
DeviceAddress termometro01, termometro02;

void setup(void)
{
  // Abrir a porta de comunicação série
  Serial.begin(9600);
  Serial.println("Testes do sensor Dallas 18B20");

  // Iniciar a biblioteca DallasTemperature
  sensors.begin();

  // Procurar dispositivos no barramento one wire
  Serial.print("A procurar sensores... ");
  Serial.print(sensors.getDeviceCount(), DEC);
  Serial.println(" sensores encontrados");

  // Informar o mode de alimentação (passivo ou ativo)
  Serial.print("Modo de alimentacao 'parasita' - "); 
  if (sensors.isParasitePowerMode()) Serial.println("ligado");
  else Serial.println("desligado");

  /*  Método 1 de obtenção dos endereços dos sensores

        Os endereços no barramento podem ser obtidos tanto com o método oneWire.search(enderecoDoSensor)
        ou com sensors.getAddress(enderecoDoSensor, indice[0, 1, ...])
  
  */

  if (!sensors.getAddress(termometro01, 0)) Serial.println("Endereco do sensor 01 nao detectado!"); 
  // if (!sensors.getAddress(termometro02, 1)) Serial.println("Endereco do sensor 02 nao detectado!"); 

  /*  Método 2 de obtenção dos endereços dos sensores
  
        O método search() procura o dispositivo seguinte no barramento
        Devolve 1 se for encontrado um novo endereço
        Devolve 0 se o barramento está curto-circuitado, não há sensores ou já foram detetados todos
        É recomendado verificar o CRC para garantir que não se lê lixo (ainda não sei como fazer isso)

        Este método:   oneWire.reset_search();   deve ser chamado antes do search() para remomeçar a 
        pesquisa de sensores
        
        Exemplo:
        
        // Reinicializar a pesquisa de sensores
        oneWire.reset_search();
        // Guarda o endereço do primeiro sensor detectado
        if (!oneWire.search(insideThermometer)) Serial.println("Unable to find address for insideThermometer");
        // Guarda o endereço do segundo sensor detectado
        if (!oneWire.search(outsideThermometer)) Serial.println("Unable to find address for outsideThermometer");
  */
  
  // Mostrar endereços dos dispositivos no barramento
  Serial.print("Endereco do sensor 01: ");
  mostraEndereco(termometro01);

  // Serial.print("\nEndereco do sensor 02: ");
  // mostraEndereco(termometro02);

  // Definir a resolução dos sensores
  sensors.setResolution(termometro01, RESOLUCAO_TEMPERATURA);
  // sensors.setResolution(termometro02, RESOLUCAO_TEMPERATURA);

  Serial.print("\nResolucao do sensor 01: ");
  Serial.print(sensors.getResolution(termometro01), DEC); 

  // Serial.print("\nResolucao do sensor 02: ");
  // Serial.print(sensors.getResolution(termometro02), DEC); 
  Serial.println();
}

// Mostra o endereço de um dispositivo
void mostraEndereco(DeviceAddress deviceAddress)
{
  for (uint8_t i = 0; i < 8; i++)
  {
    // Preencher com zeros se necessário
    if (deviceAddress[i] < 16) Serial.print("0");
    Serial.print(deviceAddress[i], HEX);
  }
}

// Mostra a temperatura de um dispositivo
void mostraTemperatura(DeviceAddress deviceAddress)
{
  float tempC = sensors.getTempC(deviceAddress);
  Serial.print("Temperatura C: ");
  Serial.print(tempC);
  
  /*
  // Alerta sonoro
  if (tempC > 31) {
    tone(9, 900);
  } else {
    noTone(9);
  }
  */
  
  // Testes: output sonoro conforme a temperatura
  // tone(9, map(tempC, 25, 38, 100, 900));
  // Serial.print("Temperatura F: ");
  // Serial.print(DallasTemperature::toFahrenheit(tempC));
}

// Mostra a resloução de um sensor
void printResolution(DeviceAddress deviceAddress)
{
  Serial.print("Resolucao: ");
  Serial.print(sensors.getResolution(deviceAddress));
  Serial.println();
}

// Mostra informações sobre o sensor
void mostraInfoSensores(DeviceAddress deviceAddress)
{
  Serial.print("Endereco do sensor: ");
  mostraEndereco(deviceAddress);
  Serial.print(" ");
  mostraTemperatura(deviceAddress);
  Serial.println();
}

void loop(void)
{ 
  // Obter a temperatura de todos os sensores no barramento
  Serial.print("A obter temperaturas... ");
  sensors.requestTemperatures();
  Serial.println("OK");

  // Mostrar informações sobre os sensores
  mostraInfoSensores(termometro01);
  Serial.println();
  // mostraInfoSensores(termometro02);
  delay(2000);
}


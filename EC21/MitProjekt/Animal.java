/*
William Grynderup Klindt: 71347.
Jacob Peter Diesel Nielsen: 71317.
Luchas Nickolaj Schmidt: 71413. 
*/

package MitProjekt; //En package er en måde på at gruppere relateret classes med hinanden. Ligesom en mappe med relateret filer i.

import java.util.Random;

public class Animal { 
    public int posX; //Tre attributter der definere et Animal i vores game. Det er en form for bestemt data
    public int posY; //Hvilket som helst Animal i gamet har en X og Y position
    static boolean isDead; // Og enten er animal i live eller ej. Alle disse attributter er et animal associeret med.

    public Animal(int posX, int posY, boolean isDead) { //Dette er animal-konstruktøren. For at lave et anmal skal vi lave et nyt objekt.
        this.posX = posX; //Men konstruktøren skal i dette tilfælde have tre parametre, som er angivet i paranteserne
        this.posY = posY; //Dette er i stedet for at man skriver Animal animal1 = new Animal(); også animal.posX = 1, og for de andre parametre
        this.isDead = isDead; 
    }

    public static Animal[] makeAnimals() { //Metode vi kalder på i Game class. 
    //En metode af typen Animal som er en klasse, hvis returnere et array over animals
        Animal[] animals = new Animal[3]; //At skabe et array kræver to trin. 1. Først erklærer vi et array variable.
        //2. Via new bliver array-variablen tildelt data. I vores tilfælde gør vi begge på en linje.
        for (int i = 0; i < animals.length; i++) { 

            Random aRandom = new Random();
            int x = aRandom.nextInt(10);
            int y = aRandom.nextInt(10);

            animals[i] = new Animal(x, y, false);//Her skaber vi et animal objekt via konstruktøren. Den skal have tre parametre.

        }
        return animals; //Siden det er en metode af typen Array (Animal[]), skal den også returnere et Array, når metoden er eksekveret
    }
}
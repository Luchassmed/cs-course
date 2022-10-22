/*
William Grynderup Klindt: 71347.
Jacob Peter Diesel Nielsen: 71317.
Luchas Nickolaj Schmidt: 71413. 
*/

package MitProjekt;

import java.util.Scanner;
import java.util.Random;

public class Game { // Denne class indeholder spillet. En class er en samling af metoder.

    int[][] board; // Et 2D array består af et antal af lister, og hvor mange pladser der er inde i
                   // hver liste.
    int width; // En variable for antallet af det første af de to arrays. X-værdien.
    int height; // En varibale for antallet af det andet af de to arrays. Y-værdien.

    static int jumpCount = 3; // En variable for hvor mange hop player kan bruge. Grænse på 3.

    public Game(int width, int height) { /*
                                          * Konstruktør til vores Game class, der initialisere objektet Game, der er
                                          * breden og højden af vores bræt.
                                          */

        this.width = width;
        this.height = height;
        this.board = new int[width][height]; // Den tildeler variablerne for breden og højden til vores obejekt Game. Kontruktøren tildeler width
        //og height til linje 14.
    }

    public void printBoard() { // Metode der printer spillebrættet.
        System.out.println("VELKOMMEN TIL SPILLET!");
        System.out.println("DU SKAL LOKKE DYRENE IND I HINANDEN");
        System.out.println("ELLER IND I STENENDE FOR AT VINDE.");
        System.out.println("      ------> SPIL <------");

        for (int y = 0; y < height; y++) { // Double nested for loop, der printer værdierne for X og Y positionerne.
            String field = "|";
            for (int x = 0; x < width; x++) {
                if (this.board[x][y] == 0) {
                    field += " _ ";
                }
                if (this.board[x][y] == 1) {
                    field += " O ";
                }
                if (this.board[x][y] == 2) {
                    field += " X ";
                }
                if (this.board[x][y] == 3) {
                    field += " $ ";
                }
            }
            field += "|";
            System.out.println(field); // Denne linje printer hele nested for loop.
        }
        System.out.println();
        System.out.println("SPILLER: $");
        System.out.println("DYR: X");
        System.out.println("STEN: O");
        System.out.println("W: OP | A: VENSTRE | S: NED | D: HØJRE");
        System.out.println("J: HOP. DU HAR " + jumpCount + " HOP TILBAGE");

    }

    public void Obst(int x, int y) { /*
                                      * Her tildeler vi værdierne til vores nested for loop. Metoderne bruger vi til
                                      * at angive aktøernes symboler
                                      */
        this.board[x][y] = 1;
    }

    public void Anis(int x, int y) {
        this.board[x][y] = 2;
    }

    public void Play(int x, int y) {
        this.board[x][y] = 3;
    }

    public static Animal[] isAnimalDead(int animalI, int animalJ,
            Animal[] animalsList) { /* Opretter en metode for at tjekke om dyrene er døde. */
        if (animalsList[animalI].posX == animalsList[animalJ].posX
                && animalsList[animalI].posY == animalsList[animalJ].posY) {
            animalsList[animalI].isDead = true;
            animalsList[animalJ].isDead = true;
        }
        return animalsList;
    }

    public static Animal[] animalMoves(int animal, int player, Animal[] animalsList,
            Player[] playerList) { /* Metode der får dyrene til at bevæge sig mod spilleren. */
        if (animalsList[animal].isDead == false) {
            if (animalsList[animal].posX > playerList[player].posX) {
                animalsList[animal].posX--;
            }
            if (animalsList[animal].posX < playerList[player].posX) {
                animalsList[animal].posX++;
            }
            if (animalsList[animal].posY > playerList[player].posY) {
                animalsList[animal].posY--;
            }
            if (animalsList[animal].posY < playerList[player].posY) {
                animalsList[animal].posY++;
            }
        }
        return animalsList;
    }

    public static boolean outOfMap(int player, int width, int height, boolean gameRuns,
            Player[] playerList) { /* Metode der tjekker om spilleren er ude fra banen. */
        if (playerList[player].posX < 0) {
            gameRuns = false;
        }

        if (playerList[player].posX > width) {
            gameRuns = false;
        }

        if (playerList[player].posY > height) {
            gameRuns = false;
        }

        if (playerList[player].posY < 0) {
            gameRuns = false;
        }

        return gameRuns;
    }

    public static void main(String[] args) {

        String playerInput; // String variable der modtager en string fra scanneren.
        char playerInputChar; // Char variable der bruges til at benytte charAt();
        Scanner input = new Scanner(System.in);

        boolean gameRuns = true; /* Boolean der angiver om spillet kører eller om det er vundet. */
        boolean gameWon = false;

        Obstacle[] obstacles = Obstacle
                .makeObstacles(); /* Vi laver nogle nogle tomme lister med objekter fra de forskellige klasser */

        Animal[] animals = Animal.makeAnimals();

        Player[] player = Player.makePlayer();

        while (gameRuns == true) { /* While loop der kører mens spillet kører. */

            System.out.print("\033[H\033[2J"); /*
                                                * Clearer terminalen:
                                                * https://stackoverflow.com/questions/2979383/how-to-clear-the-console
                                                */

            Game board = new Game(10, 10); /*
                                            * Vi laver et nyt objekt, der skal have to værdier. De to værdier angiver
                                            * hvor stort board skal være.
                                            */

            for (int i = 0; i < animals.length; i++) { // Angiver hvilke kordinater field skal være X, frem for " _ "
                                                       // (dyr).
                board.Anis(animals[i].posX, animals[i].posY);
            }

            for (int i = 0; i < obstacles.length; i++) { // Angiver hvilke kordinater field skal være O, frem for " _ "
                                                         // (obstacles).
                board.Obst(obstacles[i].posX, obstacles[i].posY);
            }

            board.Play(player[0].posX, player[0].posY); // Angiver hvilke kordinater field skal være $, frem for " _ "
                                                        // (spiller).

            animals = isAnimalDead(0, 1, animals); // Tjekker om dyrene støder ind i hinanden via metoden.
            animals = isAnimalDead(0, 2, animals);
            animals = isAnimalDead(1, 2, animals);

            board.printBoard(); // Printer board.

            playerInput = input.next(); // Tager imod string fra scanneren.
            playerInputChar = playerInput
                    .charAt(0); /*
                                 * Det første tegn fra brugerInput bliver overført til playerInputChar.
                                 */

            switch (playerInputChar) { /*
                                        * Switch-statement som kigger på playerInputChar. Playerens position afhænger
                                        * af input fra scanneren.
                                        */
            case 'w':
                player[0].posY--;
                break;

            case 's':
                player[0].posY++;
                break;

            case 'a':
                player[0].posX--;
                break;

            case 'd':
                player[0].posX++;
                break;

            case 'j':
                if (playerInputChar == 'j' && jumpCount > 0) { /*
                                                                * Hvis input er 'j', bliver spillerens position random.
                                                                * jumpCount bliver sat én ned.
                                                                */
                    Random r = new Random();
                    int jumpX = r.nextInt(9);
                    int jumpY = r.nextInt(9);
                    player[0].posY = jumpY;
                    player[0].posX = jumpX;
                    jumpCount--;
                }
                break;
            }

            gameRuns = outOfMap(0, board.width - 1, board.height - 1, gameRuns,
                    player); /* Slutter spillet hvis spilleren er ude for board. */

            for (int i = 0; i < animals.length; i++) { /*
                                                        * Hvis et dyr dør, skal positionen sættes til det første
                                                        * obstacle.
                                                        */
                if (animals[i].isDead == true) {
                    animals[i].posX = obstacles[0].posX;
                    animals[i].posY = obstacles[0].posY;
                }
            }

            for (int i = 0; i < animals.length; i++) { /* Hvis dyrene ikke er døde, så kan de rykke sig */
                if (animals[i].isDead == false) {
                    animals = animalMoves(i, 0, animals, player);

                    if (animals[i].posX == player[0].posX
                            && animals[i].posY == player[0].posY) { /*
                                                                     * Hvis dyrets position er ens med spilleren, så
                                                                     * slutter spillet.
                                                                     */
                        gameRuns = false;
                    }
                }

                if (animals[i].posX == obstacles[0].posX && animals[i].posY == obstacles[0].posY
                        || animals[i].posX == obstacles[1].posX && animals[i].posY == obstacles[1].posY
                        || animals[i].posX == obstacles[2].posX
                                && animals[i].posY == obstacles[2].posY) { /*
                                                                            * Hvis dyrets position er ens med obstacles,
                                                                            * så dør de.
                                                                            */
                    animals[i].isDead = true;

                }
                if (animals[0].isDead == true && animals[1].isDead == true
                        && animals[2].isDead == true) { /* Hvis alle dyr er døde, så er spillet vundet */
                    gameWon = true;
                }

                for (int j = 0; j < obstacles.length; j++) { /* Hvis spiller rammer obstacle, så er spillet tabt. */
                    if (player[0].posX == obstacles[j].posX && player[0].posY == obstacles[j].posY) {
                        gameRuns = false;
                    }
                }
            }

            if (gameRuns != true && gameWon != true) { /* Hvis spillet er tabt, skal dette eksekveres. */
                input.close();
                System.out.print("\033[H\033[2J");
                for (Player number : player) { 
                    System.out.println("Du har tabt! Dine kordinater X: " + number.posX + " Y: " + number.posY);
                }
            }
            if (gameWon == true) { /* Hvis spillet er vundet, skal dette eksekveres. */
                input.close();
                System.out.print("\033[H\033[2J");
                System.out.println("Du har vundet! ");
                gameRuns = false;

            }

        }

    }

}
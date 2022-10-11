import java.util.ArrayList;

public class algoritmeTest {

    public static void main(String[] args) {
        int[] liste = { 6,2,5,1,8,9,4};

        /*var algoritmeInsertion = new insertionSort();
        algoritmeInsertion.sortering(liste);*/

        /*var algoritmeBubble = new bubbleSort();
        algoritmeBubble.sortering(liste);*/

        /*var algoritmeBubbleRev = new bubbleSortRev();
        algoritmeBubbleRev.sortering(liste);*/

        /*for (int i : liste) {
            System.out.print(i + ", ");
        }*/

///// --> ArrayList <-- /////

        ArrayList<Integer> listea = new ArrayList<Integer>();
        listea.add(1); listea.add(2); listea.add(3);

        var algoritmeBubbleArrayList = new bubbleSortArrayList();
        algoritmeBubbleArrayList.sortering(listea);
        System.out.println(listea);
    }
}

class insertionSort {
    public void sortering(int[] array) {
        for (int i = 1; i < array.length; i++) {
            int nuværende = array[i];
            int j = i;
            while (j > 0 && array[j - 1] > nuværende) {
                array[j] = array[j - 1];
                j--;
            }
            array[j] = nuværende;
        }
    }
}

class bubbleSort {
    public void sortering(int[] array) {
        for (int i = 0; i < array.length; i++) {
            for (int j = 0; j < array.length - i - 1; j++) {
                if (array[j] > array[j + 1]) { //Vender man større/mindre tegn, sortere den listen anderledes.
                    // swap
                    int h = array[j];
                    array[j] = array[j + 1];
                    array[j + 1] = h;
                }
            }
        }
    }
}

class bubbleSortRev {
    public void sortering(int[] array) {
        for (int i = 0; i < array.length; i++) {
            for (int j = 0; j < array.length - i - 1; j++) {
                if (array[j] < array[j + 1]) {
                    // swap
                    int h = array[j];
                    array[j] = array[j + 1];
                    array[j + 1] = h;
                }
            }
        }
    }
}

class bubbleSortArrayList {
    public void sortering(ArrayList<Integer> array) {
        for (int i = 0; i < array.size(); i++) {
            for (int j = 0; j < array.size() - i - 1; j++) {
                if (array.get(j) > array.get(j + 1)) { 
                    // swap
                    int h = array.get(j);
                    array.set(j, array.get(j+1));
                    array.set(j+1, h);
                }
            }
        }
    }
}

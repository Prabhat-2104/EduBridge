package nov12;
public class SecondSmallest {
    public static void main(String[] args) {
        int[] numbers = {23, 45, 32, 22, 20, 96};
        int secondSmallest = findSecondSmallest(numbers);
        if (secondSmallest == Integer.MAX_VALUE) {
            System.out.println("Second smallest element doesn't exist.");
        } else {
            System.out.println("The second smallest element is: " + secondSmallest);
        }
    }

    public static int findSecondSmallest(int[] numbers) {
        if (numbers.length < 2) {
            return Integer.MAX_VALUE; 
        }
        int smallest = Integer.MAX_VALUE;
        int secondSmallest = Integer.MAX_VALUE;

        for (int num : numbers) {
            if (num < smallest) {
                secondSmallest = smallest;
                smallest = num;
            } else if (num > smallest && num < secondSmallest) {
                secondSmallest = num;
            }
        }

        return secondSmallest;
    }
}
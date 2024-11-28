package nov4;

public class Fact {
	
	    public static void main(String[] args) {
	        double sum = 0.0;
	        for (int i = 1; i <= 10; i++) {
	            double factorial = 1.0;	            
	            for (int j = 1; j <= i; j++) {
	                factorial *= j;
	            }
	            sum += 1.0 / factorial;
	        }

	        System.out.println(sum);
	    }
	}


package nov8;

public class GeneratePrime {

	public static void main(String[] args) {
		int c=0;
		for(int num=1;num<=100;num++) { //1 2 3 4 5 6 7 8 ...100
			c=0;
			for(int i=1;i<=num;i++) { //num= 2 1 2
				if(num%i==0) {
					c++;
				}
			}
			if(c==2) {
				System.out.print(num+" ");
			}
		}
		//System.out.println(c);
	}

}

package nov21;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.util.Scanner; 

public class FileHanding {
	public static void main(String[] args)
    {
 
        try {
            File Obj = new File("C://Users//HP//Downloads//Order.docx/");
            if (Obj.createNewFile()) {
                System.out.println("File created successful: "
                                   + Obj.getName());
            }
            else {
                System.out.println("File already exists.");
            }
        }
        catch (IOException e) {
            System.out.println("An error has occurred.");
            e.printStackTrace();
        }
    }
}

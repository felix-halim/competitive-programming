import java.util.*;
import java.math.*;
import java.io.*;

public class A {
	public static void main(String[] args) throws IOException {
		Scanner scan = new Scanner(System.in);
		int nTC = scan.nextInt();
		while (nTC-- > 0){
			BigInteger x = BigInteger.valueOf(scan.nextInt());
			BigInteger y = BigInteger.valueOf(scan.nextInt());
			BigInteger n = BigInteger.valueOf(scan.nextInt());
			BigInteger z = x.modPow(y,n);
			System.out.println( z );
		}
	}
}


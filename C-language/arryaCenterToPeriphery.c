int main()
{
    int i = 0,j = 0,m = 0, n = 0,array[50][50];
    scanf("%d %d", &m, &n);
    int k = m*n;
     for (int y = 0; y < n; y++) {
            array[0][y] = k;
            k--;
        }
        for (int x = 1; x < m; x++) {
            array[x][n - 1] = k;
            k--;
        }
        for (int y = n - 2; y >= 0; y--) {
            array[m - 1][y] = k;
            k--;
        }
        for (int x = m - 2; x > 0; x--) {
            array[x][0] = k;
            k--;
        }
        
        int c = 1;
        int d = 1;
        while(k > 1)
        {
         
                while (array[c][d + 1] == 0) {
                    array[c][d] = k;
                    k--;
                    d++;
                }
     
               
                while (array[c + 1][d] == 0) {
                    array[c][d] = k;
                    k--;
                    c++;
                }
     
              
                while (array[c][d - 1] == 0) {
                    array[c][d] = k;
                    k--;
                    d--;
                }
     
                
                while (array[c - 1][d] == 0) {
                    array[c][d] = k;
                    k--;
                    c--;
                }
        }
               for (int x = 0; x < m; x++) {
            for (int y = 0; y < n; y++) {
                if (array[x][y] == 0) {
                    array[x][y] = k;
                }
            }
        }
        
       for (int x = 0; x < m; x++)
       {
        for (int y = 0; y < n; y++)
        {
            if(array[x][y]<10)
            {
               printf("  %d",array[x][y]); 
            }
            else
            {
                printf(" %d", array[x][y]);
            }
            
        }
        
        printf("\n");
        }

    return 0;
}

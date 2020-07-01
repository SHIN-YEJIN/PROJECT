#include <stdio.h>
#include <stdlib.h>
#include <openssl/rsa.h>
#include <openssl/pem.h>
#include <string.h>
#define BIT_LEN 2048

void free_all(BIGNUM *bne,RSA *rsa,BIO *private,BIO *public);

void Generate_Key(RSA** rsa,BIO *public,BIO *private)
{
 	BIGNUM *bne = NULL;
	unsigned long e = RSA_F4;
	int ret;

	bne = BN_new();
	ret = BN_set_word(bne,e);	
	if(ret!=1)
		free_all(bne,*rsa,private,public);

	*rsa = RSA_new();
	ret = RSA_generate_key_ex(*rsa,BIT_LEN,bne,NULL);
	if(ret!=1)
		free_all(bne,*rsa,private,public);

	public = BIO_new_file("serv_public.pem","w+");
	ret = PEM_write_bio_RSAPublicKey(public,*rsa);
	if(ret!=1)
		free_all(bne,*rsa,private,public);

	private = BIO_new_file("serv_private.pem","w+");
	ret = PEM_write_bio_RSAPrivateKey(private,*rsa,NULL,NULL,0,NULL,NULL);
	if(ret!=1)
		free_all(bne,*rsa,private,public);
}


void free_all(BIGNUM* bne,RSA *rsa,BIO *private,BIO *public)
{
	BN_free(bne);
	RSA_free(rsa);
	BIO_free_all(private);
	BIO_free_all(public);
	printf("Generate_Key erro\n");
	exit(1);
}

void main()
{
	RSA *rsa=NULL;
	BIO *public = NULL;
	BIO *private = NULL;
	char msg[BUFSIZ];
	unsigned char *ciphertext,*plaintext;
	int encrypt_len,decrypt_len;

	Generate_Key(&rsa,public,private);
	
	printf("input your message\n");
	fgets(msg,sizeof(msg),stdin);
	msg[sizeof(msg)-1] = '\0';

	ciphertext = (unsigned char*)malloc(RSA_size(rsa)+1);
	plaintext = (unsigned char*)malloc(RSA_size(rsa)+1);

	encrypt_len = RSA_public_encrypt(strlen(msg),msg,ciphertext,rsa,RSA_PKCS1_OAEP_PADDING);
	printf("cipher : %s\n",ciphertext);
	decrypt_len = RSA_private_decrypt(encrypt_len,ciphertext,plaintext,rsa,RSA_PKCS1_OAEP_PADDING);

	plaintext[decrypt_len] = '\0';
	printf("plaintext : %s\n",plaintext);
}

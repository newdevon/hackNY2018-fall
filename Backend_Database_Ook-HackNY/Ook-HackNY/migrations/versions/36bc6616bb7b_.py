"""empty message

Revision ID: 36bc6616bb7b
Revises: 
Create Date: 2018-09-29 20:40:32.351543

"""
from alembic import op
import sqlalchemy as sa


# revision identifiers, used by Alembic.
revision = '36bc6616bb7b'
down_revision = None
branch_labels = None
depends_on = None


def upgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.create_table('stations',
    sa.Column('id', sa.Integer(), nullable=False),
    sa.Column('lat', sa.Float(), nullable=True),
    sa.Column('lng', sa.Float(), nullable=True),
    sa.PrimaryKeyConstraint('id')
    )
    op.drop_table('users')
    # ### end Alembic commands ###


def downgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.create_table('users',
    sa.Column('id', sa.INTEGER(), autoincrement=True, nullable=False),
    sa.Column('name', sa.TEXT(), autoincrement=False, nullable=True),
    sa.Column('email', sa.TEXT(), autoincrement=False, nullable=True),
    sa.Column('facebook', sa.TEXT(), autoincrement=False, nullable=True),
    sa.Column('snapchat', sa.TEXT(), autoincrement=False, nullable=True),
    sa.Column('instagram', sa.TEXT(), autoincrement=False, nullable=True),
    sa.PrimaryKeyConstraint('id', name=u'users_pkey')
    )
    op.drop_table('stations')
    # ### end Alembic commands ###
